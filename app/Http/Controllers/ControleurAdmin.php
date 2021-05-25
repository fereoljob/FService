<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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
    function AjouStat()
    {
        $user = $this->verification();
        $data = ['prof'=>$user];
        return view('Administration/adminspage/status/AjouStat',$data);
    }
    function FormStatAjou(Request $requete)
    {
        //validation de la requete
        $requete->validate(
            ['Nom'=>"Required",
            "NbreHeure"=>"Required",
            "NbreHeureMax"=>"Required"]
        );
        //traitement post Validation
        $nom = $requete->Nom;
        $nbreheure = $requete->NbreHeure;
        $nbreheuremax = $requete->NbreHeureMax;
        $donnees = ["nom_statut"=>$nom,"nbre_heure"=>$nbreheure,"nbre_heure_max"=>$nbreheuremax];
        $insertion = DB::table('statuts')->insert($donnees);
        if($insertion)
        {
            $user = $this->verification();
            $data = ['prof'=>$user,"succes"=>$insertion];
            return view('Administration/adminspage/status/AjouStat',$data);
        }
        else
        {
            return back()->with('Echec',"Echec de l'insertion");
        }
    }
    function SuppStat()
    {
        $user = $this->verification();
        $status = DB::table('statuts')->get();
        $data = ['prof'=>$user,'status'=>$status];
        return view('Administration/adminspage/status/SuppStat',$data);
    }
    function FormStatSupp(Request $requete)
    {
        //traitement
        $suppression = DB::table('statuts')->where('id_statut',$requete->infostatus)->delete();
        if($suppression)
        {
            $user = $this->verification();
            $status = DB::table('statuts')->get();
            $data = ['prof'=>$user,'status'=>$status,"succes"=>$suppression];
            return view('Administration/adminspage/status/SuppStat',$data);
        }
        else
        {
            return back()->with("Echec","Echec de la suppression");
        }
    }
    function ModStat()
    {
        $user = $this->verification();
        $status = DB::table('statuts')->get();
        $data = ['prof'=>$user,'status'=>$status];
        return view('Administration/adminspage/status/ModStat',$data);
    }
    function FormStatMod(Request $requete)
    {
        //traitement
        $modification = DB::table('statuts')->where("id_statut",$requete->infostatus)->get();
        if($modification)
        {
            $user = $this->verification();
            $status = DB::table('statuts')->get();
            $data = ['prof'=>$user,'status'=>$status,"modification"=>$modification];
            return view('Administration/adminspage/status/ModStat',$data);
        }
    }
    function ModificationStat(Request $requete)
    {
        //traitement de  la requete
        $nom = $requete->nom;
        $nbre_heure = $requete->nbre_heure;
        $nbre_heure_max = $requete->nbre_heure_max;
        $id_statut = $requete->id_statut;
        $modif = DB::table('statuts')->where('id_statut',$id_statut)
        ->update(['nom_statut'=>$nom,'nbre_heure'=>$nbre_heure,'nbre_heure_max'=>$nbre_heure_max]);
        if($modif)
        {
            $user = $this->verification();
            $status = DB::table('statuts')->get();
            $data = ['prof'=>$user,'status'=>$status,'succes'=>$modif];
            return view('Administration/adminspage/status/ModStat',$data);
        }
    }
    function AjouProf()
    {
        $user = $this->verification();
        $status = DB::table('statuts')->get();
        $departements = DB::table('departements')->get();
        $data = ['prof'=>$user,'status'=>$status,'departements'=>$departements];
        return view('Administration/adminspage/professeurs/AjouProf',$data);
    }
    function FormProfAjou(Request $requete)
    {
        //validation de la requete
        $requete->validate([
            "nom"=>"Required",
            "prenom"=>"Required",
            "service"=>"Required"
        ]);
        //traitement de la requete
        $nom = $requete->nom;
        $prenom = $requete->prenom;
        $service = $requete->service;
        $statut = $requete->status;
        $departement = $requete->departement;
        $donnees =['nom_professeur'=>$nom,'prenom_professeur'=>$prenom,'service'=>$service,'id_statut'=>$statut,'id_departement'=>$departement];
        $insertion = DB::table('professeurs')->insert($donnees);
        if($insertion)
        {
            $user = $this->verification();
            $status = DB::table('statuts')->get();
            $departements = DB::table('departements')->get();
            $data = ['prof'=>$user,'status'=>$status,'departements'=>$departements,'succes'=>$insertion];
            return view('Adminstration/adminspage/professeurs/AjouProf',$data);
        }
        else
        {
            return back()->with("Echec","Echec de l'insertion");
        }
    }
    function SuppProf()
    {
        $user = $this->verification();
        $professeurs = DB::table('professeurs')->get();
        $data = ['prof'=>$user,'professeurs'=>$professeurs];
        return view('Administration/adminspage/professeurs/SuppProf',$data);
    }
    function FormProfSupp(Request $requete)
    {
        //traitement de la requete
        $suppression= DB::table("professeurs")->where("id_professeur",$requete->id_professeur)->delete();
        if($suppression)
        {
            $user = $this->verification();
            $professeurs = DB::table('professeurs')->get();
            $data = ['prof'=>$user,'professeurs'=>$professeurs,'succes'=>$suppression];
            return view('Administration/adminspage/professeurs/SuppProf',$data);
        }
        else
        {
            return back()->with("Echec","Echec de suppression");
        }
    }
    function ModProf()
    {
        $user = $this->verification();
        $professeurs = DB::table('professeurs')->get();
        $data = ['prof'=>$user,'professeurs'=>$professeurs];
        return view('Administration/adminspage/professeurs/ModProf',$data);
    }
    function FormProfMod(Request $requete)
    {
        //traiement de la requete
        $modification = DB::table("professeurs")->where("id_professeur",$requete->id_professeur)->get();
        if($modification)
        {
            $user = $this->verification();
            $professeurs = DB::table('professeurs')->get();
            $status = DB::table('statuts')->get();
            $departements = DB::table('departements')->get();
            $data = ['prof'=>$user,'professeurs'=>$professeurs,"modification"=>$modification,'status'=>$status,'departements'=>$departements];
            return view('Administration/adminspage/professeurs/ModProf',$data);
        }
    }
    function ModificationProf()
    {

    }
    function AjouNiv()
    {
        $user = $this->verification();
        $categories = DB::table('categories')->get();
        $professeurs = DB::table('professeurs')->get();
        $data = ['prof'=>$user,'categories'=>$categories,'professeurs'=>$professeurs];
        return view('Administration/adminspage/niv_etudes/AjouNiv',$data);
    }
    function SuppNiv()
    {
        $user = $this->verification();
        $niv_etudes = DB::table('niveau_etudes')->get();
        $data = ['prof'=>$user,'niv_etudes'=>$niv_etudes];
        return view('Administration/adminspage/niv_etudes/SuppNiv',$data);
    }
    function ModNiv()
    {
        $user = $this->verification();
        $niv_etudes = DB::table('niveau_etudes')->get();
        $data = ['prof'=>$user,'niv_etudes'=>$niv_etudes];
        return view('Administration/adminspage/niv_etudes/ModNiv',$data);
    }
    function AjouCat()
    {
        $user = $this->verification();
        $data =['prof'=>$user];
        return view('Administration/adminspage/categories/AjouCat',$data);
    }
    function SuppCat()
    {
        $user = $this->verification();
        $categories = DB::table('categories')->get();
        $data =['prof'=>$user,'categories'=>$categories];
        return view('Administration/adminspage/categories/SuppCat',$data);
    }
    function ModCat()
    {
        $user = $this->verification();
        $categories = DB::table('categories')->get();
        $data =['prof'=>$user,'categories'=>$categories];
        return view('Administration/adminspage/categories/ModCat',$data);
    }
    function AjouSem()
    {
        $user = $this->verification();
        $niv = DB::table('niveau_etudes')->get();
        $data =['prof'=>$user,'niv_etudes'=>$niv];
        return view('Administration/adminspage/semestres/AjouSem',$data);
    }
    function SuppSem()
    {
        $user = $this->verification();
        $semestre_niv = DB::table('semestres')->leftjoin('niveau_etudes','semestres.id_niveau','=','niveau_etudes.id_niveau')->get();
        $data =['prof'=>$user , 'semestre_niv'=>$semestre_niv];
        return view('Administration/adminspage/semestres/SuppSem',$data);
    }
    function ModSem()
    {   
        $user = $this->verification();
        $semestre_niv = DB::table('semestres')->leftjoin('niveau_etudes','semestres.id_niveau','=','niveau_etudes.id_niveau')->get();
        $data =['prof'=>$user , 'semestre_niv'=>$semestre_niv];
        return view('Administration/adminspage/semestres/ModSem',$data);
    }
    function AjouMat()
    {
        $user = $this->verification();
        $semestre_niv = DB::table('semestres')->leftjoin('niveau_etudes','semestres.id_niveau','=','niveau_etudes.id_niveau')->get();
        $professeurs = DB::table('professeurs')->get();
        $departements = DB::table('departements')->get();
        $data = ['prof'=>$user,'professeurs'=>$professeurs,'departements'=>$departements,'semestre_niv'=>$semestre_niv];
        return view('Administration/adminspage/matieres/AjouMat',$data);
    }
    function SuppMat()
    {
        $user = $this->verification();
        $matieres = DB::table('matieres')->get();
        $data =['prof'=>$user,'matieres'=>$matieres];
        return view('Administration/adminspage/matieres/SuppMat',$data);
    }
    function ModMat()
    {
        $user = $this->verification();
        $matieres = DB::table('matieres')->get();
        $data =['prof'=>$user,'matieres'=>$matieres];
        return view('Administration/adminspage/matieres/ModMat',$data);
    }
    function AjouTyp()
    {
        $user = $this->verification();
        $data = ['prof'=>$user];
        return view('Administration/adminspage/type_enseignements/AjouTyp',$data);
    }
    function SuppTyp()
    {
        $user = $this->verification();
        $type = DB::table('type_enseignements')->get();
        $data = ['prof'=>$user,'type'=>$type];
        return view('Administration/adminspage/type_enseignements/SuppTyp',$data);
    }
    function ModTyp()
    {
        $user = $this->verification();
        $type = DB::table('type_enseignements')->get();
        $data = ['prof'=>$user,'type'=>$type];
        return view('Administration/adminspage/type_enseignements/ModTyp',$data);
    }
    function AjouPart()
    {
        $user = $this->verification();
        $matieres = DB::table('matieres')->leftjoin('semestres','matieres.id_semestre','=','semestres.id_semestre')
        ->leftjoin('niveau_etudes','semestres.id_niveau','=','niveau_etudes.id_niveau')
        ->get();
        $type = DB::table('type_enseignements')->get();
        $data = ['prof'=>$user,'matieres'=>$matieres,'type'=>$type];
        return view('Administration/adminspage/parties/AjouPart',$data);
    }
    function SuppPart()
    {
        $user = $this->verification();
        $parties = DB::table('parties')->leftjoin('matieres','parties.id_matiere','=','matieres.id_matiere')
        ->leftjoin('type_enseignements','parties.type_enseignement','=','type_enseignements.id_type_enseignement')
        ->leftjoin('semestres','matieres.id_semestre','=','semestres.id_semestre')
        ->leftjoin('niveau_etudes','semestres.id_niveau','=','niveau_etudes.id_niveau')
        ->get();
        $data = ['prof'=>$user,'parties'=>$parties];
        return view('Administration/adminspage/parties/SuppPart',$data);
    }
    function ModPart()
    {   
        $user = $this->verification();
        $parties = DB::table('parties')->leftjoin('matieres','parties.id_matiere','=','matieres.id_matiere')
        ->leftjoin('type_enseignements','parties.type_enseignement','=','type_enseignements.id_type_enseignement')
        ->leftjoin('semestres','matieres.id_semestre','=','semestres.id_semestre')
        ->leftjoin('niveau_etudes','semestres.id_niveau','=','niveau_etudes.id_niveau')
        ->get();
        $data = ['prof'=>$user,'parties'=>$parties];
        return view('Administration/adminspage/parties/ModPart',$data);
    }

}
