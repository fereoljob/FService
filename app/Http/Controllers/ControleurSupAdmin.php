<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Professeur;
class ControleurSupAdmin extends Controller
{
    function donnees()
    {
        $user=$this->verification();
        $professeurs  = DB::table('users')->join('professeurs','users.id_professeur','=','professeurs.id_professeur')
        ->select('users.id_professeur','professeurs.nom_professeur','professeurs.prenom_professeur','users.email')
        ->where('type_user','Professeur')->get();
        $membres = DB::table('users')->whereNull('id_professeur')->get();
        $admins = DB::table('users')->join('professeurs','users.id_professeur','=','professeurs.id_professeur')
        ->select('users.id_professeur','professeurs.nom_professeur','professeurs.prenom_professeur')->where('users.admin','1')->get();
        $supadmins = DB::table('users')->join('professeurs','users.id_professeur','=','professeurs.id_professeur')
        ->select('users.id_professeur','professeurs.nom_professeur','professeurs.prenom_professeur')->where('users.supadmin','1')->get();
        $data=['prof'=>$user,'admins'=>$admins,'supadmins'=>$supadmins,'membres'=>$membres,'professeurs'=>$professeurs];
        return $data;
    }
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
        $utilisateurs = DB::table('professeurs')->whereNotExists(function($query){
            $query->select('*')->from('users')->whereColumn('users.id_professeur','professeurs.id_professeur');
        })->get();
        $data=['prof'=>$user,'utilisateurs'=>$utilisateurs];
        return view('Administration/supadminspage/FormAjouUser',$data);
    }
    function Supprimer()
    {
        $data = $this->donnees();
        return view('Administration/supadminspage/FormSuppUser',$data);
    }
    function Modifier()
    {
        $data = $this->donnees();
        return view('Administration/supadminspage/FormModUser',$data);
    }
    function AjoutEnvoi(Request $requete)
    {
        //validation de la requete
        $requete->validate([
            "type"=>"Required",
            "email"=>"Required|email",
            "mdp"=>"Required"
        ]);
        //traitement post validation
        $email = $requete->email;
        $mdp = $requete->mdp;
        $type = $requete->type;
        if(isset($requete->admin))
        {
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
        }
        else
        {
            $admin=0;
            $admin2 = 0;
        }
        if($type=="Professeur")
        {
            $prof = $requete->prof;
            $donnees = ['id_professeur'=>$prof,'email'=>$email,'type_user'=>$type,'password'=>$mdp,'admin'=>$admin,'supadmin'=>$admin2];
        }
        else
        {
            $donnees = ['email'=>$email,'type_user'=>$type,'password'=>$mdp,'admin'=>$admin,'supadmin'=>$admin2];
        }
        $util = DB::table('users')->insert($donnees);
        if($util)
        {
            $user=$this->verification();
        $utilisateurs = DB::table('professeurs')->whereNotExists(function($query){
            $query->select('*')->from('users')->whereColumn('users.id_professeur','professeurs.id_professeur');
        })->get();
        $data=['prof'=>$user,'utilisateurs'=>$utilisateurs,'succes'=>$util];
            return view('Administration/supadminspage/FormAjouUser',$data);
        }
        else
        {
            return back()->with('Echec',"Echec de l'insertion");
        }
        
    }
    function SuppEnvoi(Request $requete)
    {
        //validation de la requete
        $requete->validate([
            'prof'=>'Required'
        ]);
        //traitement post validation
        $util2 = DB::table('users')->where('email',$requete->prof)->delete();
        $data = $this->donnees();
        $data["succes"] = $util2; 
        if($util2)
        {
            return view('Administration/supadminspage/FormSuppUser',$data);
        }
        else
        {
            return back()->with('Echec',"Echec de la suppression");
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
        $tab = DB::table('users')->where('email',$requete->prof)->first();
        $data = $this->donnees();
        $data['tab']=$tab;
        return view('Administration/supadminspage/FormModUser',$data);
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
        $valadmin = 0;
        $valsupadmin = 0;
        if($admin==1)
        {
            $valadmin =1;
            $valsupadmin = 0;
        }
        else if($admin==2)
        {
            $valadmin =0;
            $valsupadmin = 1;
        }
        else
        {
            $valadmin =0;
            $valsupadmin = 0;
        }
        $id_user = $requete->id_user;
        $resultat = DB::table('users')->where('id_user',$id_user)->update(['email'=>$email,'password'=>$mdp,'admin'=>$valadmin,'supadmin'=>$valsupadmin]);
        $data = $this->donnees();
        $data["succes"] = $resultat; 
        if($resultat)
        {
            return view('Administration/supadminspage/FormModUser',$data);
        }
        else
        {
           return  back()->with('Echec',"Echec de la Mise à jour");
        }
    }
    function AjoutDep()
    {
        $user=$this->verification();
        $responsables = DB::table('professeurs')->whereNotExists(function($query){
            $query->select('*')->from('departements')->whereColumn('professeurs.id_professeur','departements.responsable_departement');
        })->get();
        $data=['prof'=>$user,'responsables'=>$responsables];
        return view('Administration/supadminspage/FormAjouDep',$data);
    }
    function AjouDepForm(Request $requete)
    {
        //validation de la requete
        $requete->validate([
            "nom"=>"Required"
        ]);
        //traitement post validation
        $nom_dep = $requete->nom;
        $id_responsable = $requete->responsable;
        $champs = ['nom_departement'=>$nom_dep,'responsable_departement'=>$id_responsable];
        $resul = DB::table('departements')->insert($champs);
        if($resul)
        {
            $user=$this->verification();
            $responsables = DB::table('professeurs')->whereNotExists(function($query){
            $query->select('*')->from('departements')->whereColumn('professeurs.id_professeur','departements.responsable_departement');
            })->get();
            $data=['prof'=>$user,'responsables'=>$responsables,'succes'=>$resul];   
            return view('Administration/supadminspage/FormAjouDep',$data);
        }
        else
        {
           return back()->with('Echec',"Echec de l'insertion");
        }
    }
    function SuppDep()
    {
        $user=$this->verification();
        $departements = DB::table('departements')->get();
        $data=['prof'=>$user,'departements'=>$departements];
        return view('Administration/supadminspage/FormSuppDep',$data);
    }
    function SuppDepForm(Request $requete)
    {
        
        //validation de la requete
        $requete->validate([
            'id'=>'Required'
        ]);
        //traitement post validation
        $resul = DB::table('departements')->where('id_departement',$requete->id)->delete();
        if($resul)
        {
            $user=$this->verification();
            $departements = DB::table('departements')->get();
            $data=['prof'=>$user,'departements'=>$departements];
            $data['succes']=$resul;
            return view('Administration/supadminspage/FormSuppDep',$data);
        }
        else
        {
            return back()->with('Echec',"Echec de la suppression");
        }
    }
    function ModiDep()
    {
        $user=$this->verification();
        $departements = DB::table('departements')->get();
        $data=['prof'=>$user,'departements'=>$departements];
        return view('Administration/supadminspage/FormModDep',$data);
    }
    
    function ModDepForm(Request $requete)
    {
        $user=$this->verification();
        $departements = DB::table('departements')->get();
        $data=['prof'=>$user,'departements'=>$departements];
        //validation de la requete
        $requete->validate([
            'id'=>'Required'
        ]);
        //traitement post validation
        $responsables = DB::table('professeurs')->whereNotExists(function($query){
            $query->select('*')->from('departements')->whereColumn('professeurs.id_professeur','departements.responsable_departement');
        })->get();
        $tab = DB::table('departements')->leftJoin('professeurs','departements.responsable_departement','=','professeurs.id_professeur')
        ->select('departements.id_departement','professeurs.nom_professeur','departements.nom_departement','departements.responsable_departement','professeurs.prenom_professeur')
        ->where('departements.id_departement',$requete->id)->get();
        $data['responsables']=$responsables;
        $data['tab']=$tab;
        return view('Administration/supadminspage/FormModDep',$data);
    }
    function ModificationDep(Request $requete)
    {
        $user = $this->verification();
        //validation de la requete
        $requete->validate([
            "nom"=>'Required'
        ]);
        //traitement de la requete
        $nom = $requete->nom;
        $id_respo = $requete->responsable;
        $id_departement = $requete->id_departement;
        $resultat = DB::table('departements')->where('id_departement',$id_departement)->update(['nom_departement'=>$nom,'responsable_departement'=>$id_respo]);
        $user=$this->verification();
        $departements = DB::table('departements')->get();
        $data=['prof'=>$user,'departements'=>$departements];
        $data["succes"] = $resultat; 
        if($resultat)
        {
            return view('Administration/supadminspage/FormModDep',$data);
        }
        else
        {
            return back()->with('Echec',"Echec de la Mise à jour");
        }
    }
}
