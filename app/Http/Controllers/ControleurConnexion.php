<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Professeur;
use App\Models\Categorie;

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
            $categories = DB::table("categories")->pluck("nom_categorie","id_categorie");
            if($user)
            {
                $data=['infoConnexionUser'=>$user,'prof'=>$prof, 'categories' => $categories];
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
                $data = ['infoConnexionUser'=>'null', 'categories' => $categories];
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
            $data=['prof'=>$prof];
            return view('Administration/supadmin',$data);
        }
    }
    function admin()
    {
        return "En cours de developpement";
    }

    public function niveauEtudes(Request $request){
        $niveau_etudes = DB::table("niveau_etudes")->where("id_categorie", $request->id_categorie)
        ->pluck("nom_niveau", "id_niveau");
        return response()->json($niveau_etudes);
    }

    public function semestres(Request $request){
        $semestres = DB::table("semestres")->where("id_niveau", $request->id_niveau)
        ->pluck("nom_semestre", "id_semestre");
        return response()->json($semestres);
    }

}
