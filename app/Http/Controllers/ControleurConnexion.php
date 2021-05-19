<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Professeur;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControleurConnexion extends Controller
{
    function connexion(){
        return view('Connexion/connexion');
    }
    function login(Request $requete)
    {
        //validation de la requete
        $requete->validate([
            "inputEmail"=>"Required|email",
            "inputPassword"=>"Required"
        ]);
        //traitement post validation
        //$user = User::where("email","=",$requete->inputEmail)->first();
        $user = DB::table("users")->where("email",$requete->inputEmail)->first();
        if($user)
        {
            if($requete->inputPassword==$user->password)
            {
                if($user->type_user=="Professeur")
                    $requete->session()->put('LoggedUser',$user->id_professeur);
                else
                    $requete->session()->put('LoggedUser',"000");
                return redirect('profile');
            }
            else
            {
                return back()->with('Echec',"Mot de passe invalide");
            }
        }
        else
        {
            return back()->with('Echec',"Pas d'utilisateur avec ces identifiants");
        }
    }
    function logout()
    {
        if(session()->has('LoggedUser'))
        {
            session()->pull('LoggedUser');
            return redirect('/');
        }
        else
        {
            return redirect('/');
        }
    }
    function profile()
    {
        if(session()->has('LoggedUser'))
        {
            $user = User::where('id_professeur','=',session('LoggedUser'))->first();
            $prof = Professeur::where('id_professeur','=',session('LoggedUser'))->first();
            if($user)
            {
                $data=['infoConnexionUser'=>$user,'prof'=>$prof];
                if($user->admin==1 || $user->supadmin==1)
                {
                    return view('Connexion/panneau',$data);
                }
                else
                {
                    return view('Utilisateur/profile',$data);
                }
            }
            else
            {
                $data = ['infoConnexionUser'=>'null'];
                return view('Utilisateur/profile',$data);
            }
        }
    }
    function feuille()
    {
        if(session()->has('LoggedUser'))
        {
            $prof = Professeur::where('id_professeur','=',session('LoggedUser'))->first();
            $data=['prof'=>$prof];
            return view('Utilisateur/profile',$data);
        }
    }
    function supadmin()
    {
        if(session()->has('LoggedUser'))
        {
            $prof = Professeur::where('id_professeur','=',session('LoggedUser'))->first();
            $utilisateurs = DB::table('users')->join('professeurs','users.id_professeur','=','professeurs.id_professeur')
            ->get();
            $membres = DB::table('users')->where('type_user',"Membre_administratif")->get();
            $departements = DB::table('departements')->join('professeurs','departements.responsable_departement','=','professeurs.id_professeur')
            ->get();
            $data =['prof'=>$prof,'membres'=>$membres,'utilisateurs'=>$utilisateurs,'departements'=>$departements];
            return view('Administration/supadminspage/supadmin',$data);
        }
    }
    function admin()
    {
        $prof = Professeur::where('id_professeur','=',session('LoggedUser'))->first();
        $status = DB::table('statuts')->get();
        $professeurs = DB::table('professeurs')->leftJoin('statuts','professeurs.id_statut','=','statuts.id_statut')
        ->leftJoin('departements','professeurs.id_departement','=','departements.id_departement')->get();
        $niv_etudes = DB::table('niveau_etudes')->leftJoin('categories','niveau_etudes.id_categorie','=','categories.id_categorie')
        ->leftJoin('professeurs','niveau_etudes.responsable_annee','=','professeurs.id_professeur')->get();
        $categories = DB::table('categories')->get();
        $semestre = DB::table('semestres')->leftjoin('niveau_etudes','semestres.id_niveau','=','niveau_etudes.id_niveau')->get();
        $matieres = DB::table('matieres')->leftJoin('semestres','matieres.id_semestre','=','semestres.id_semestre')
        ->leftJoin('professeurs','matieres.responsable_matiere','=','professeurs.id_professeur')
        ->leftJoin('departements','matieres.id_departement','=','departements.id_departement')->get();
        $type_enseignements = DB::table('type_enseignements')->get();
        $parties = DB::table('parties')->leftJoin('matieres','parties.id_matiere','=','matieres.id_matiere')
        ->leftJoin('type_enseignements','parties.type_enseignement','=','type_enseignements.id_type_enseignement')->get();
        $afffectations = DB::table('affectations')
        ->leftJoin('parties','affectations.id_partie','=','parties.id_partie')->leftJoin('professeurs','affectations.id_professeur','=','professeurs.id_professeur')->get();
        $data=['prof'=>$prof,'status'=>$status,'professeurs'=>$professeurs,
        'niv_etudes'=>$niv_etudes,'categories'=>$categories,'semestres'=>$semestre,'matieres'=>$matieres,
        'type_enseignements'=>$type_enseignements,'parties'=>$parties,'affectations'=>$afffectations];
        return view('Administration/adminspage/admin',$data);
    }
}
