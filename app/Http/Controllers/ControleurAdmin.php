<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ControleurAdmin extends Controller
{
    function verification()
    {
        if(session()->has('LoggedUser'))
        {
            $user= User::where('id_user','=',session('LoggedUser'))->first();
            return $user;
        }
    }
    function ajouter()
    {
        $user=$this->verification();
        $data=['infoConnexionUser'=>$user];
        return view('Administration/FormAjouAdm',$data);
    }
    function Supprimer()
    {
        $user=$this->verification();
        $data=['infoConnexionUser'=>$user];
        return view('Administration/FormSuppAdm',$data);
    }
    function Modifier()
    {
        $user=$this->verification();
        $data=['infoConnexionUser'=>$user];
        return view('Administration/FormModAdm',$data);
    }
    
    function listing(Request $requete)
    {
            $userC=$this->verification();
            $val= $requete->table;
            $user = DB::table('users')->where($val,'1')->get();
            $fic = $requete->fic;
            return view('Administration/'.$fic,['liste'=>$user,'infoConnexionUser'=>$userC]);
    }

    function AjoutEnvoi(Request $requete)
    {
        $user = $this->verification();
        $data=['infoConnexionUser'=>$user];
        //validation de la requete
        $requete->validate([
            "nom"=>"Required",
            "prenom"=>"Required",
            "email"=>"Required|email",
            "mdp"=>"Required",
            "admin"=>"Required"
        ]);
        //traitement post validation
        $nom = $requete->nom;
        $prenom = $requete->prenom;
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
        $data = ['nom'=>$nom,'prenom'=>$prenom,'email'=>$email,'type_user'=>$type,'password'=>$mdp,'admin'=>$admin,'supadmin'=>$admin2];
        $util = DB::table('users')->insert($data);
        if($util)
        {
            echo "<script type='text/javascript' >alert('insertion Reussie');</script>";
            $user=$this->verification();
            $data=['infoConnexionUser'=>$user];
            return view('Administration/FormAjouAdm',$data);
        }
        else
        {
            back()->with('Echec',"Echec de l'insertion");
        }
        
    }
    function SuppEnvoi(Request $requete)
    {
        $user = $this->verification();
        $data=['infoConnexionUser'=>$user];
        //validation de la requete
        $requete->validate([
            'id'=>'Required'
        ]);
        //traitement post validation
        $util = DB::table('users')->where('id_user',$requete->id)->first();
        if(empty($util))
        {
            back()->with('Echec',"Un utilisateur de type admin ou super admin avec l'id entré");
        }
        else if($util->admin == 0 && $util->supadmin==0)
        {   
            back()->with('Echec',"L'id specifier n'appartient pas a un admin ou un super admin");
        }
        else
        {
            $util2 = DB::table('users')->where('id_user',$requete->id)->delete();
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
    }
    function ModiEnvoi(Request $requete)
    {
        $user = $this->verification();
        $data=['infoConnexionUser'=>$user];
        //validation de la requete
        $requete->validate([
            "id"=>"Required",
            "nom"=>"Required",
            "prenom"=>"Required",
            "email"=>"Required|email",
            "mdp"=>"Required",
        ]);
        //traitement post validation
        $util = DB::table('users')->where('id_user',$requete->id)->first();
        if(empty($util))
        {
            back()->with('Echec',"Un utilisateur de type admin ou super admin avec l'id entré");
        }
        else if($util->admin == 0 && $util->supadmin==0)
        {   
            back()->with('Echec',"L'id specifier n'appartient pas a un admin ou un super admin");
        }
        else
        {
            $id= $requete->id;
            $nom = $requete->nom;
            $prenom = $requete->prenom;
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
            $util2 = DB::table('users')->where('id_user',$id)->update(['nom'=>$nom,'prenom'=>$prenom,'email'=>$email,'type_user'=>$type,'password'=>$mdp,'admin'=>$admin,'supadmin'=>$admin2]);
            if($util2)
            {
                echo "<script type='text/javascript' >alert('Mise à jour Reussie');</script>";
                return view('Administration/FormModAdm',$data);
            }
            else
            {
                back()->with('Echec',"Echec de la mise à jour");
            }
        }
    }
    function listeDep(Request $requete)
    {
            $userC=$this->verification();
            $val= $requete->table;
            if($val=="Departement")
            {
                $table = DB::table('departements')->get();
                $intable = "Departements";
            }
             
            else
            {
                $table= DB::table('professeurs')->get();
                $intable= "Professeurs";
            }
            $fic = $requete->fic;
            return view('Administration/'.$fic,['liste'=>$table,'infoConnexionUser'=>$userC,'infotable'=>$intable]);
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
