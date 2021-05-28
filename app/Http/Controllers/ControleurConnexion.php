<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\Professeur;
use App\Models\Categorie;
use App\Models\Partie;

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
            $user = User::where('id_professeur','=',session('LoggedUser'))->first();
            $prof = Professeur::where('id_professeur','=',session('LoggedUser'))->first();
            $categories = DB::table("categories")->pluck("nom_categorie","id_categorie");
            $data=['infoConnexionUser'=>$user,'prof'=>$prof, 'categories' => $categories];
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
            $departements = DB::table('departements')->leftJoin('professeurs','departements.responsable_departement','=','professeurs.id_professeur')
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

    public function niveauEtudes(Request $request){
        $categories = DB::table("categories")->where("categories.id_categorie", $request->id_categorie)->get();
        $niveau_etudes = DB::table("niveau_etudes")->join("semestres", "niveau_etudes.id_niveau", "=", "semestres.id_niveau")
        ->join("matieres", "matieres.id_semestre", "=", "semestres.id_semestre")
        ->join("parties", "matieres.id_matiere", "=", "parties.id_matiere")
        ->select("niveau_etudes.id_niveau","niveau_etudes.nom_niveau", db::raw('count(parties.type_enseignement) as val'))
        ->where("niveau_etudes.id_categorie", $request->id_categorie)
        ->groupBy('niveau_etudes.nom_niveau', 'niveau_etudes.id_niveau')->get();
        $semestres = DB::table("niveau_etudes")->join("semestres", "niveau_etudes.id_niveau", "=", "semestres.id_niveau")
        ->join("matieres", "matieres.id_semestre", "=", "semestres.id_semestre")
        ->join("parties", "matieres.id_matiere", "=", "parties.id_matiere")
        ->select("semestres.id_semestre", "semestres.nom_semestre", db::raw('count(parties.type_enseignement) as val1'))
        ->where("niveau_etudes.id_categorie", $request->id_categorie)
        ->groupBy("semestres.id_semestre","semestres.nom_semestre")->get();
        $matieres = DB::table("niveau_etudes")->join("semestres", "niveau_etudes.id_niveau", "=", "semestres.id_niveau")
        ->join("matieres", "matieres.id_semestre", "=", "semestres.id_semestre")
        ->join("parties", "matieres.id_matiere", "=", "parties.id_matiere")
        ->select("matieres.id_matiere", "matieres.nom_matiere", db::raw('count(parties.type_enseignement) as val2'))
        ->where("niveau_etudes.id_categorie", $request->id_categorie)->groupBy('matieres.id_matiere', 'matieres.nom_matiere')
        ->get();
        $parties = DB::table("niveau_etudes")->join("semestres", "niveau_etudes.id_niveau", "=", "semestres.id_niveau")
        ->join("matieres", "matieres.id_semestre", "=", "semestres.id_semestre")
        ->join("parties", "parties.id_matiere", "=", "matieres.id_matiere")
        ->join("type_enseignements", "type_enseignements.id_type_enseignement", "=", "parties.type_enseignement")
        ->where("niveau_etudes.id_categorie", $request->id_categorie)
        ->orderBy('parties.id_partie')->get();
        $heures = DB::table("niveau_etudes")->join("semestres", "niveau_etudes.id_niveau", "=", "semestres.id_niveau")
        ->join("matieres", "matieres.id_semestre", "=", "semestres.id_semestre")
        ->join("parties", "parties.id_matiere", "=", "matieres.id_matiere")
        ->join("type_enseignements", "type_enseignements.id_type_enseignement", "=", "parties.type_enseignement")
        ->where("id_categorie", $request->id_categorie)
        ->select("parties.id_partie","parties.id_matiere", "parties.nbre_groupe", "parties.nbre_heure", db::raw('(type_enseignements.coefficient * parties.nbre_heure) as mult'))->orderBy('parties.id_partie')->get();
        $profs = DB::table("professeurs")->get();
        return response()->json([
            'categories' => $categories,
            'niveau_etudes'=> $niveau_etudes,
            'semestres'=> $semestres,
            'matieres'=>$matieres,
            'parties'=>$parties,
            'heures'=>$heures,
            'profs' =>$profs
        ]);
    }

    public function semestres(Request $request){
        $categories = DB::table("categories")->join("niveau_etudes", "niveau_etudes.id_categorie", "=", "categories.id_categorie")->where("niveau_etudes.id_niveau", $request->id_niveau)->get();
        $niveau_etudes = DB::table("niveau_etudes")->join("semestres", "niveau_etudes.id_niveau", "=", "semestres.id_niveau")->join("matieres", "matieres.id_semestre", "=", "semestres.id_semestre")
        ->join("parties", "matieres.id_matiere", "=", "parties.id_matiere") ->select("niveau_etudes.id_niveau", "niveau_etudes.nom_niveau", db::raw('count(parties.type_enseignement) as val')) ->where("niveau_etudes.id_niveau", $request->id_niveau )
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
        ->join("parties", "parties.id_matiere", "=", "matieres.id_matiere")->join("type_enseignements", "type_enseignements.id_type_enseignement", "=", "parties.type_enseignement")->where("niveau_etudes.id_niveau", $request->id_niveau)
        ->select("parties.id_partie","parties.id_matiere", "parties.nbre_groupe", "parties.nbre_heure", db::raw('(type_enseignements.coefficient * parties.nbre_heure) as mult'))->orderBy('parties.id_partie')->get();
        $profs = DB::table("professeurs")->get();
        return response()->json([
            'categories' => $categories,
            'niveau_etudes' => $niveau_etudes,
            'semestres' => $semestres,
            'matieres' => $matieres,
            'parties' => $parties,
            'heures' => $heures,
            'profs' =>$profs
        ]);
    }

    public function affichage(Request $request){
        $categories = DB::table("categories")->join("niveau_etudes", "niveau_etudes.id_categorie", "=", "categories.id_categorie")->join('semestres', "semestres.id_niveau", "=", "niveau_etudes.id_niveau")
        ->where('semestres.id_semestre', $request->id_semestre)->get();
        $niveau_etudes = DB::table("niveau_etudes")->join('semestres', "semestres.id_niveau", "=", "niveau_etudes.id_niveau")->join("matieres", "semestres.id_semestre", "=", "matieres.id_semestre")
        ->join("parties", "parties.id_matiere","=", "matieres.id_matiere") ->select("niveau_etudes.id_niveau", "niveau_etudes.nom_niveau", db::raw('count(parties.type_enseignement) as val'))->groupBy("niveau_etudes.id_niveau", "niveau_etudes.nom_niveau")
        ->where('semestres.id_semestre', $request->id_semestre)->get();
        $semestres = DB::table("niveau_etudes")->join('semestres', "semestres.id_niveau", "=", "niveau_etudes.id_niveau")->join("matieres", "semestres.id_semestre", "=", "matieres.id_semestre")
        ->join("parties", "parties.id_matiere","=", "matieres.id_matiere")->select("semestres.id_semestre", "semestres.nom_semestre", db::raw('count(parties.type_enseignement) as val1'))->groupBy("semestres.id_semestre", "semestres.nom_semestre")
        ->where('semestres.id_semestre', $request->id_semestre)->get();
        $matieres = DB::table("niveau_etudes")->join('semestres', "semestres.id_niveau", "=", "niveau_etudes.id_niveau")->join("matieres", "semestres.id_semestre", "=", "matieres.id_semestre")
        ->join("parties", "parties.id_matiere","=", "matieres.id_matiere")->select("matieres.id_matiere", "matieres.nom_matiere", db::raw('count(parties.type_enseignement) as val2'))->where('semestres.id_semestre', $request->id_semestre)
        ->groupBy('matieres.id_matiere', 'matieres.nom_matiere')->get();
        $parties = DB::table("niveau_etudes")->join("semestres", "niveau_etudes.id_niveau", "=", "semestres.id_niveau")->join("matieres", "matieres.id_semestre", "=", "semestres.id_semestre")
        ->join("parties", "parties.id_matiere", "=", "matieres.id_matiere")->join("type_enseignements", "type_enseignements.id_type_enseignement", "=", "parties.type_enseignement")->where('semestres.id_semestre', $request->id_semestre)
        ->orderBy('parties.id_partie')->get();
        $heures = DB::table("niveau_etudes")->join("semestres", "niveau_etudes.id_niveau", "=", "semestres.id_niveau")->join("matieres", "matieres.id_semestre", "=", "semestres.id_semestre")
        ->join("parties", "parties.id_matiere", "=", "matieres.id_matiere")->join("type_enseignements", "type_enseignements.id_type_enseignement", "=", "parties.type_enseignement")->where('semestres.id_semestre', $request->id_semestre)
        ->select("parties.id_partie", "parties.id_matiere","parties.nbre_groupe", "parties.nbre_heure", db::raw('(type_enseignements.coefficient * parties.nbre_heure) as mult'))->orderBy('parties.id_partie')->get();
        $profs = DB::table("professeurs")->get();
        return response()->json([
            'categories' => $categories,
            'niveau_etudes' => $niveau_etudes,
            'semestres' => $semestres,
            'matieres' => $matieres,
            'parties' => $parties,
            'heures' => $heures,
            'profs' =>$profs
        ]);
    }

}
