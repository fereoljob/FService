<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Professeur;

class ControleurAdmin extends Controller
{
    function verification()
    {
        if(session()->has('LoggedUser'))
        {
            $user= Professeur::where('id_professeur','=',session('LoggedUser'))->first();
            return $user;
        }
    }
    function ajouter()
    {
       $user=$this->verification();
        $admins = DB::table('professeurs')->get();
        $data=['prof'=>$user,'admins'=>$admins];
        return view('Administration/FormAjouAdm',$data);
    }
    function Supprimer()
    {
        $user=$this->verification();
        $admins = DB::table('users')->join('professeurs','users.id_professeur','=','professeurs.id_professeur')
        ->select('users.id_professeur','professeurs.nom_professeur','professeurs.prenom_professeur')->where('users.admin','1')->get();
        $supadmins = DB::table('users')->join('professeurs','users.id_professeur','=','professeurs.id_professeur')
        ->select('users.id_professeur','professeurs.nom_professeur','professeurs.prenom_professeur')->where('users.supadmin','1')->get();
        $data=['prof'=>$user,'admins'=>$admins,'supadmins'=>$supadmins];
        return view('Administration/FormSuppAdm',$data);
    }
    function Modifier()
    {
        $user=$this->verification();
        $admins = DB::table('users')->join('professeurs','users.id_professeur','=','professeurs.id_professeur')
        ->select('users.id_professeur','professeurs.nom_professeur','professeurs.prenom_professeur')->where('users.admin','1')->get();
        $supadmins = DB::table('users')->join('professeurs','users.id_professeur','=','professeurs.id_professeur')
        ->select('users.id_professeur','professeurs.nom_professeur','professeurs.prenom_professeur')->where('users.supadmin','1')->get();
        $data=['prof'=>$user,'admins'=>$admins,'supadmins'=>$supadmins];
        return view('Administration/FormModAdm',$data);
    }
    function AjoutEnvoi(Request $requete)
    {
        //validation de la requete
        $requete->validate([
            "prof"=>"Required",
            "email"=>"Required|email",
            "mdp"=>"Required",
            "admin"=>"Required"
        ]);
        //traitement post validation
        $prof=$requete->prof;
        $email = $requete->email;
        $mdp = $requete->mdp;
        $type = $requete->type;
        if($requete->admin=="Admin")
        {
            $admin = 1;
            $admin2 = 0;
        }
        else
        {
            $admin=0;
            $admin2 = 1;
        }
        $donnees = ['id_professeur'=>$prof,'email'=>$email,'type_user'=>$type,'password'=>$mdp,'admin'=>$admin,'supadmin'=>$admin2];
        $util = DB::table('users')->insert($donnees);
        if($util)
        {
            echo "<script type='text/javascript' >alert('insertion Reussie');</script>";
            $user=$this->verification();
            $admins = DB::table('professeurs')->get();
            $data=['prof'=>$user,'admins'=>$admins];
            return view('Administration/FormAjouAdm',$data);
        }
        else
        {
            back()->with('Echec',"Echec de l'insertion");
        }
        
    }
    function SuppEnvoi(Request $requete)
    {
        $user=$this->verification();
        //validation de la requete
        $requete->validate([
            'prof'=>'Required'
        ]);
        //traitement post validation
        $util2 = DB::table('users')->where('id_professeur',$requete->prof)->delete();
        $admins = DB::table('users')->join('professeurs','users.id_professeur','=','professeurs.id_professeur')
        ->select('users.id_professeur','professeurs.nom_professeur','professeurs.prenom_professeur')->where('users.admin','1')->get();
        $supadmins = DB::table('users')->join('professeurs','users.id_professeur','=','professeurs.id_professeur')
        ->select('users.id_professeur','professeurs.nom_professeur','professeurs.prenom_professeur')->where('users.supadmin','1')->get();
        $data=['prof'=>$user,'admins'=>$admins,'supadmins'=>$supadmins];
        if($util2)
        {
            echo "<script type='text/javascript' >alert('Suppression Reussie');</script>";
            return view('Administration/FormSuppAdm',$data);
        }
        else
        {
            back()->with('Echec',"Echec de la suppression");
        }
    }
    function ModiEnvoi(Request $requete)
    {
        $user = $this->verification();
        //validation de la requete
        $requete->validate([
            "prof"=>'Required'
        ]);
        //traitement post validation
        $tab = DB::table('users')->where('id_professeur',$requete->prof)->first();
        $admins = DB::table('users')->join('professeurs','users.id_professeur','=','professeurs.id_professeur')
        ->select('users.id_professeur','professeurs.nom_professeur','professeurs.prenom_professeur')->where('users.admin','1')->get();
        $supadmins = DB::table('users')->join('professeurs','users.id_professeur','=','professeurs.id_professeur')
        ->select('users.id_professeur','professeurs.nom_professeur','professeurs.prenom_professeur')->where('users.supadmin','1')->get();
        $data=['prof'=>$user,'tab'=>$tab,'admins'=>$admins,'supadmins'=>$supadmins];
        return view('Administration/FormModAdm',$data);
    }
    function ValidationMod(Request $requete)
    {
        $user = $this->verification();
        //validation de la requete
        $requete->validate([
            "email"=>'Required|email',
        ]);
        //traitement de la requete
        $email = $requete->email;
        $mdp = $requete->Mdp;
        $admin = $requete->admin;
        $supadmin = $requete->supadmin;
        $id_professeur = $requete->id_professeur;
        $resultat = DB::table('users')->where('id_professeur',$id_professeur)->update(['email'=>$email,'password'=>$mdp,'admin'=>$admin,'
        supadmin'=>$supadmin]);
        if($resultat)
        {
            echo "<script type='text/javascript' >alert('Mise à jour Reussie');</script>";
            back()->with('bien','mise a jour reussie');
        }

    }
    function AjoutDep(Request $requete)
    {
        $user=$this->verification();
        $data=['infoConnexionUser'=>$user];
        return view('Administration/FormAjouDep',$data);
    }
    function SuppDep(Request $requete)
    {
        $user=$this->verification();
        $data=['infoConnexionUser'=>$user];
        return view('Administration/FormSuppDep',$data);
    }
    function ModiDep(Request $requete)
    {
        $user=$this->verification();
        $data=['infoConnexionUser'=>$user];
        return view('Administration/FormModDep',$data);
    }
    function AjouDepForm(Request $requete)
    {
        $user = $this->verification();
        $data=['infoConnexionUser'=>$user];
        //validation de la requete
        $requete->validate([
            "nom"=>"Required"
        ]);
        //traitement post validation
        $nom_dep = $requete->nom;
        $dat = ['nom_departement'=>$nom_dep];
        $resul = DB::table('departements')->insert($dat);
        if($resul)
        {
            echo "<script type='text/javascript' >alert('Insertion Reussie');</script>";
            return view('Administration/FormAjouDep',$data);
        }
        else
        {
           back()->with('Echec',"Echec de l'insertion");
        }
    }
    function SuppDepForm(Request $requete)
    {
        $user = $this->verification();
        $data=['infoConnexionUser'=>$user];
        //validation de la requete
        $requete->validate([
            'id'=>'Required'
        ]);
        //traitement post validation
        $dep = DB::table('departements')->where('id_departement',$requete->id)->first();
        if(empty($dep))
        {
            back()->with('Echec',"Un département avec pour id: $requete->id n'existe pas");
        }
        else
        {   
            $resul = DB::table('departements')->where('id_departement',$requete->id)->delete();
            if($resul)
            {
                echo "<script type='text/javascript' >alert('Suppression Reussie');</script>";
                return view('Administration/FormSuppDep',$data);
            }
            else
            {
                back()->with('Echec',"Echec de la suppression");
            }
        }
    }
    function ModDepForm(Request $requete)
    {
        $user = $this->verification();
        $data=['infoConnexionUser'=>$user];
        //validation de la requete
        $requete->validate([
            'id'=>'Required',
            'nom'=>'Required'
        ]);
        //traitement post validation
        $resul = DB::table('departements')->where('id_departement',$requete->id)->first();
        if(empty($resul))
        {
            back()->with('Echec',"Aucun département avec l'id entré, réessayez! ");
        }
        else
        {
            $departement = $requete->nom;
            $depart = DB::table('departements')->where('id_departement',$requete->id)->update(['nom_departement'=>$departement]);
            if($depart)
            {
                echo "<script type='text/javascript' >alert('Mise à jour reussie');</script>";
                return view('Administration/FormModDep',$data);
            }
            else
            {
                back()->with('Echec',"Echec de la mise à jour");
            }
        }
    }
}
