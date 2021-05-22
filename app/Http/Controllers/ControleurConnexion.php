<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Professeur;
use App\Models\Categorie;
use App\Models\Partie;

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

        $niveau_etudes = DB::table("niveau_etudes")->join("semestres", "niveau_etudes.id_niveau", "=", "semestres.id_niveau")->join("matieres", "matieres.id_semestre", "=", "semestres.id_semestre")
        ->join("parties", "matieres.id_matiere", "=", "parties.id_matiere")->select("niveau_etudes.id_niveau","niveau_etudes.nom_niveau", db::raw('count(parties.type_enseignement) as val'))
        ->where("niveau_etudes.id_categorie", $request->id_categorie)->groupBy('niveau_etudes.nom_niveau', 'niveau_etudes.id_niveau')->get();
        $semestres = DB::table("niveau_etudes")->join("semestres", "niveau_etudes.id_niveau", "=", "semestres.id_niveau")->join("matieres", "matieres.id_semestre", "=", "semestres.id_semestre")
        ->join("parties", "matieres.id_matiere", "=", "parties.id_matiere")->select("semestres.id_semestre", "semestres.nom_semestre", db::raw('count(parties.type_enseignement) as val1'))
        ->where("niveau_etudes.id_categorie", $request->id_categorie)->groupBy("semestres.id_semestre","semestres.nom_semestre")->get();
        $matieres = DB::table("niveau_etudes")->join("semestres", "niveau_etudes.id_niveau", "=", "semestres.id_niveau")->join("matieres", "matieres.id_semestre", "=", "semestres.id_semestre")
        ->join("parties", "matieres.id_matiere", "=", "parties.id_matiere")->select("matieres.id_matiere", "matieres.nom_matiere", db::raw('count(parties.type_enseignement) as val2'))
        ->where("niveau_etudes.id_categorie", $request->id_categorie)->groupBy('matieres.id_matiere', 'matieres.nom_matiere')->get();
        $parties = DB::table("niveau_etudes")->join("semestres", "niveau_etudes.id_niveau", "=", "semestres.id_niveau")->join("matieres", "matieres.id_semestre", "=", "semestres.id_semestre")
        ->join("parties", "parties.id_matiere", "=", "matieres.id_matiere")->join("type_enseignements", "type_enseignements.id_type_enseignement", "=", "parties.type_enseignement") ->where("niveau_etudes.id_categorie", $request->id_categorie)
        ->orderBy('parties.id_partie')->get();
        $heures = DB::table("niveau_etudes")->join("semestres", "niveau_etudes.id_niveau", "=", "semestres.id_niveau")->join("matieres", "matieres.id_semestre", "=", "semestres.id_semestre")
        ->join("parties", "parties.id_matiere", "=", "matieres.id_matiere")->where("id_categorie", $request->id_categorie)->orderBy('parties.id_partie')->get();
        $profs = DB::table("professeurs")->get();
        return response()->json([
            'niveau_etudes'=> $niveau_etudes,
            'semestres'=> $semestres,
            'matieres'=>$matieres,
            'parties'=>$parties,
            'heures'=>$heures,
            'profs' =>$profs
        ]);
    }

    public function semestres(Request $request){
        $niveau_etudes = DB::table("niveau_etudes")->join("semestres", "niveau_etudes.id_niveau", "=", "semestres.id_niveau")->join("matieres", "matieres.id_semestre", "=", "semestres.id_semestre")
        ->join("parties", "matieres.id_matiere", "=", "parties.id_matiere") ->select("niveau_etudes.id_niveau", "niveau_etudes.nom_niveau", db::raw('count(parties.type_enseignement) as val')) ->where("niveau_etudes.id_niveau", $request->id_niveau)
        ->groupBy("niveau_etudes.id_niveau", "niveau_etudes.nom_niveau")->get();
        $semestres = DB::table("niveau_etudes")->join("semestres", "niveau_etudes.id_niveau", "=", "semestres.id_niveau")->join("matieres", "matieres.id_semestre", "=", "semestres.id_semestre")
        ->join("parties", "matieres.id_matiere", "=", "parties.id_matiere")->select("semestres.id_semestre", "semestres.nom_semestre", db::raw('count(parties.type_enseignement) as val1'))->where("niveau_etudes.id_niveau", $request->id_niveau)
        ->groupBy("semestres.id_semestre", "semestres.nom_semestre")->get();
        $matieres = DB::table("niveau_etudes")->join("semestres", "niveau_etudes.id_niveau", "=", "semestres.id_niveau")->join("matieres", "matieres.id_semestre", "=", "semestres.id_semestre")
        ->join("parties", "matieres.id_matiere", "=", "parties.id_matiere")->select("matieres.id_matiere", "matieres.nom_matiere", db::raw('count(parties.type_enseignement) as val2'))->where("niveau_etudes.id_niveau", $request->id_niveau)
        ->groupBy('matieres.id_matiere', 'matieres.nom_matiere')->get();
        $parties = DB::table("niveau_etudes")->join("semestres", "niveau_etudes.id_niveau", "=", "semestres.id_niveau")->join("matieres", "matieres.id_semestre", "=", "semestres.id_semestre")
        ->join("parties", "parties.id_matiere", "=", "matieres.id_matiere")->join("type_enseignements", "type_enseignements.id_type_enseignement", "=", "parties.type_enseignement") ->where("niveau_etudes.id_niveau", $request->id_niveau)
        ->orderBy('parties.id_partie')->get();
        $heures = DB::table("niveau_etudes")->join("semestres", "niveau_etudes.id_niveau", "=", "semestres.id_niveau")->join("matieres", "matieres.id_semestre", "=", "semestres.id_semestre")
        ->join("parties", "parties.id_matiere", "=", "matieres.id_matiere")->where("niveau_etudes.id_niveau", $request->id_niveau)->orderBy('parties.id_partie')->get();
        return response()->json([
            'niveau_etudes' => $niveau_etudes,
            'semestres' => $semestres,
            'matieres' => $matieres,
            'parties' => $parties,
            'heures' => $heures
        ]);
    }

}
