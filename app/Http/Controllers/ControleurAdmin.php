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
            return view('Administration/adminspage/professeurs/AjouProf',$data);
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
    function ModificationProf(Request $requete)
    {
        $nom = $requete->nom;
        $prenom = $requete->prenom;
        $service= $requete->service;
        $status = $requete->status;
        $departement = $requete->departement;
        $id_professeur = $requete->id_professeur;
        $modif = DB::table('professeurs')->where('id_professeur', $id_professeur)
        ->update(['nom_professeur'=>$nom, 'prenom_professeur'=>$prenom, 'service'=>$service,
        'id_statut'=>$status, 'id_departement'=>$departement]);
        if($modif){
            $user = $this->verification();
            $professeurs = DB::table('professeurs')->get();
            $data = ['prof'=>$user,'professeurs'=>$professeurs, 'succes'=>$modif];
        return view('Administration/adminspage/professeurs/ModProf',$data);
        }
    }
    function AjouNiv()
    {
        $user = $this->verification();
        $categories = DB::table('categories')->get();
        $professeurs = DB::table('professeurs')->get();
        $data = ['prof'=>$user,'categories'=>$categories,'professeurs'=>$professeurs];
        return view('Administration/adminspage/niv_etudes/AjouNiv',$data);
    }

    function FormNivAjou(Request $requete)
    {
        $requete->validate([
            'Nom'=>"Required"
        ]);
        $nom = $requete->Nom;
        $categorie = $requete->categorie;
        $responsable = $requete ->responsable;
        $donnees = ['nom_niveau'=>$nom, 'id_categorie'=>$categorie, 'responsable_annee'=>$responsable];
        $insertion = DB::table('niveau_etudes')->insert($donnees);
        if($insertion){
            $user = $this->verification();
            $categories = DB::table('categories')->get();
            $professeurs = DB::table('professeurs')->get();
            $data = ['prof'=>$user, 'categories'=>$categories, 'professeurs'=>$professeurs,'succes'=>$insertion];
            return view('Administration/adminspage/niv_etudes/AjouNiv',$data);
        }
        else
        {
            return back()->with("Echec","Echec de l'insertion");
        }
    }

    function SuppNiv()
    {
        $user = $this->verification();
        $niv_etudes = DB::table('niveau_etudes')->get();
        $data = ['prof'=>$user,'niv_etudes'=>$niv_etudes];
        return view('Administration/adminspage/niv_etudes/SuppNiv',$data);
    }
    function FormNivSupp(Request $requete){
        $suppression = DB::table("niveau_etudes")->where("id_niveau",$requete->id_niveau)->delete();
        if($suppression){
            $user = $this->verification();
        $niv_etudes = DB::table('niveau_etudes')->get();
        $data = ['prof'=>$user,'niv_etudes'=>$niv_etudes,'succes'=>$suppression];
        return view('Administration/adminspage/niv_etudes/SuppNiv',$data);
        }
        else
        {
            return back()->with("Echec","Echec de suppression");
        }
    }
    function ModNiv()
    {
        $user = $this->verification();
        $niv_etudes = DB::table('niveau_etudes')->get();
        $data = ['prof'=>$user,'niv_etudes'=>$niv_etudes];
        return view('Administration/adminspage/niv_etudes/ModNiv',$data);
    }
    function FormNivMod(Request $requete){
        $modification = DB::table('niveau_etudes')->where("id_niveau", $requete->id_niveau)->get();
        if($modification){
            $user = $this->verification();
            $niv_etudes = DB::table('niveau_etudes')->get();
            $categories = DB::table('categories')->get();
            $professeurs = DB::table('professeurs')->get();
            $data = ['prof'=>$user,'niv_etudes'=>$niv_etudes, "modification"=>$modification,'categories'=>$categories, 'professeurs'=>$professeurs];
        return view('Administration/adminspage/niv_etudes/ModNiv',$data);
        }
    }
    function ModificationNiv(Request $requete){
        $nom = $requete->nom;
        $categorie = $requete->categorie;
        $professeur = $requete->professeur;
        $id_niveau = $requete->id_niveau;
        $modif = DB::table('niveau_etudes')->where('id_niveau', $id_niveau)
        ->update(['nom_niveau'=>$nom, 'id_categorie'=>$categorie, 'responsable_annee'=>$professeur]);
        if($modif){
            $user = $this->verification();
        $niv_etudes = DB::table('niveau_etudes')->get();
        $data = ['prof'=>$user,'niv_etudes'=>$niv_etudes, 'succes'=>$modif];
        return view('Administration/adminspage/niv_etudes/ModNiv',$data);
        }
    }
    function AjouCat()
    {
        $user = $this->verification();
        $data =['prof'=>$user];
        return view('Administration/adminspage/categories/AjouCat',$data);
    }
    function FormCatAjou(Request $requete){
        $requete->validate([
            "Nom"=>"Required"
        ]);
        $nom = $requete->Nom;
        $donnees = ['nom_categorie'=>$nom];
        $insertion = DB::table('categories')->insert($donnees);
        if($insertion){
            $user = $this->verification();
            $data = ['prof'=>$user, 'succes'=>$insertion];
            return view('Administration/adminspage/categories/AjouCat',$data);
        }
        else{
            return back()->with("Echec","Echec de l'insertion");
        }
    }
    function SuppCat()
    {
        $user = $this->verification();
        $categories = DB::table('categories')->get();
        $data =['prof'=>$user,'categories'=>$categories];
        return view('Administration/adminspage/categories/SuppCat',$data);
    }
    function FormCatSupp(Request $requete){
        $suppression = DB::table("categories")->where("id_categorie",$requete->categorie)->delete();
        if($suppression){
            $user = $this->verification();
        $categories = DB::table('categories')->get();
        $data =['prof'=>$user,'categories'=>$categories,'succes'=>$suppression];
        return view('Administration/adminspage/categories/SuppCat',$data);
        }
        else {
            return back()->with("Echec","Echec de suppression");
        }
    }
    function ModCat()
    {
        $user = $this->verification();
        $categories = DB::table('categories')->get();
        $data =['prof'=>$user,'categories'=>$categories];
        return view('Administration/adminspage/categories/ModCat',$data);
    }
    function FormCatMod(Request $requete){
        $modification = DB::table("categories")->where("id_categorie",$requete->categorie)->get();
        if($modification){
            $user = $this->verification();
        $categories = DB::table('categories')->get();
        $data =['prof'=>$user,'categories'=>$categories, "modification"=>$modification];
        return view('Administration/adminspage/categories/ModCat',$data);
        }
    }
    function ModificationCat(Request $requete){
        $nom = $requete->nom;
        $id_categorie = $requete->id_categorie;
        $modif = DB::table('categories')->where('id_categorie', $id_categorie)
        ->update(['nom_categorie'=>$nom]);
        if($modif){
            $user = $this->verification();
        $categories = DB::table('categories')->get();
        $data =['prof'=>$user,'categories'=>$categories, 'succes'=>$modif];
        return view('Administration/adminspage/categories/ModCat',$data);
        }
    }
    function AjouSem()
    {
        $user = $this->verification();
        $niv = DB::table('niveau_etudes')->get();
        $data =['prof'=>$user,'niv_etudes'=>$niv];
        return view('Administration/adminspage/semestres/AjouSem',$data);
    }
    function FormSemAjou(Request $requete){
        $requete->validate([
            "Nom"=>"Required"
        ]);
        $nom = $requete->Nom;
        $niveau = $requete->niveau;
        $donnees = ['nom_semestre'=>$nom, 'id_niveau'=>$niveau];
        $insertion = DB::table('semestres')->insert($donnees);
        if($insertion){
            $user = $this->verification();
            $niv = DB::table('niveau_etudes')->get();
            $data = ['prof'=>$user, 'niv_etudes'=>$niv, 'succes'=>$insertion];
            return view('Administration/adminspage/semestres/AjouSem',$data);
        }
        else{
            return back()->with("Echec","Echec de l'insertion");
        }
    }
    function SuppSem()
    {
        $user = $this->verification();
        $semestre_niv = DB::table('semestres')->leftjoin('niveau_etudes','semestres.id_niveau','=','niveau_etudes.id_niveau')->get();
        $data =['prof'=>$user , 'semestre_niv'=>$semestre_niv];
        return view('Administration/adminspage/semestres/SuppSem',$data);
    }
    function FormSemSupp(Request $requete){
        $suppression = DB::table("semestres")->where("id_semestre", $requete->id_semestre)->delete();
        if($suppression){
            $user = $this->verification();
        $semestre_niv = DB::table('semestres')->leftjoin('niveau_etudes','semestres.id_niveau','=','niveau_etudes.id_niveau')->get();
        $data =['prof'=>$user , 'semestre_niv'=>$semestre_niv, 'succes'=>$suppression];
        return view('Administration/adminspage/semestres/SuppSem',$data);
        }
        else
        {
            return back()->with("Echec","Echec de suppression");
        }
    }
    function ModSem()
    {
        $user = $this->verification();
        $semestre_niv = DB::table('semestres')->leftjoin('niveau_etudes','semestres.id_niveau','=','niveau_etudes.id_niveau')->get();
        $data =['prof'=>$user , 'semestre_niv'=>$semestre_niv];
        return view('Administration/adminspage/semestres/ModSem',$data);
    }
    function FormSemMod(Request $requete){
        $modification = DB::table("semestres")->where("id_semestre",$requete->id_semestre)->get();
        if($modification){
            $user = $this->verification();
            $semestre_niv = DB::table('semestres')->leftjoin('niveau_etudes','semestres.id_niveau','=','niveau_etudes.id_niveau')->get();
            $data =['prof'=>$user , 'semestre_niv'=>$semestre_niv, "modification"=>$modification];
        return view('Administration/adminspage/semestres/ModSem',$data);
        }
    }
    function ModificationSem(Request $requete){
        $nom_sem = $requete->semestre;
        $niv = $requete->niveau;
        $id_semestre = $requete->id_semestre;
        $modif = DB::table("semestres")->where("id_semestre", $id_semestre)
        ->update(['nom_semestre'=>$nom_sem, 'id_niveau'=>$niv]);
        if($modif){
            $user = $this->verification();
        $semestre_niv = DB::table('semestres')->leftjoin('niveau_etudes','semestres.id_niveau','=','niveau_etudes.id_niveau')->get();
        $data =['prof'=>$user , 'semestre_niv'=>$semestre_niv, 'succes'=>$modif];
        return view('Administration/adminspage/semestres/ModSem',$data);
        }
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
    function FormMatAjou(Request $requete){
        $requete->validate([
            "Nom"=>"Required"
        ]);
        $nom = $requete->Nom;
        $semestre_niv = $requete->id_semestre;
        $professeurs = $requete->responsable;
        $departements = $requete->departement;
        $donnees = ['nom_matiere'=>$nom, 'id_semestre'=>$semestre_niv, 'responsable_matiere'=>$professeurs, 'id_departement'=>$departements];
        $insertion = DB::table('matieres')->insert($donnees);
        if($insertion){
            $user = $this->verification();
            $semestre_niv = DB::table('semestres')->leftjoin('niveau_etudes','semestres.id_niveau','=','niveau_etudes.id_niveau')->get();
            $professeurs = DB::table('professeurs')->get();
        $departements = DB::table('departements')->get();
        $data = ['prof'=>$user,'professeurs'=>$professeurs,'departements'=>$departements,'semestre_niv'=>$semestre_niv, 'succes'=>$insertion];
        return view('Administration/adminspage/matieres/AjouMat',$data);
        }
        else{
            return back()->with("Echec","Echec de l'insertion");
        }
    }
    function SuppMat()
    {
        $user = $this->verification();
        $matieres = DB::table('matieres')->get();
        $data =['prof'=>$user,'matieres'=>$matieres];
        return view('Administration/adminspage/matieres/SuppMat',$data);
    }
    function FormMatSupp(Request $requete){
        $suppression = DB::table("matieres")->where("id_matiere", $requete->id_matiere)->delete();
        if($suppression){
            $user = $this->verification();
        $matieres = DB::table('matieres')->get();
        $data =['prof'=>$user,'matieres'=>$matieres, 'succes'=>$suppression];
        return view('Administration/adminspage/matieres/SuppMat',$data);
        }
        else{
            return back()->with("Echec","Echec de suppression");
        }
    }
    function ModMat()
    {
        $user = $this->verification();
        $matieres = DB::table('matieres')->get();
        $data =['prof'=>$user,'matieres'=>$matieres];
        return view('Administration/adminspage/matieres/ModMat',$data);
    }
    function FormMatMod(Request $requete){
        $modification = DB::table("matieres")->where("id_matiere", $requete->id_matiere)->get();
        if($modification){
            $user = $this->verification();
            $matieres = DB::table('matieres')->get();
            $semestres = DB::table('semestres')->get();
            $professeurs = DB::table('professeurs')->get();
            $departements = DB::table('departements')->get();
            $data =['prof'=>$user,'matieres'=>$matieres, "modification"=>$modification, 'semestres'=>$semestres, 'professeurs'=>$professeurs, 'departements'=>$departements];
        return view('Administration/adminspage/matieres/ModMat',$data);
        }
    }

    function ModificationMat(Request $requete){
        $nom = $requete->nom;
        $semestres = $requete->semestres;
        $professeurs = $requete->professeurs;
        $departements = $requete->departements;
        $id_matiere = $requete->id_matiere;
        $modif = DB::table('matieres')->where('id_matiere', $id_matiere)
        ->update(['nom_matiere'=> $nom, 'id_semestre'=>$semestres, 'responsable_matiere'=>$professeurs,
        'id_departement'=>$departements]);
        if($modif){
            $user = $this->verification();
            $matieres = DB::table('matieres')->get();
        $data =['prof'=>$user,'matieres'=>$matieres, 'succes'=>$modif];
        return view('Administration/adminspage/matieres/ModMat',$data);
        }
    }

    function AjouTyp()
    {
        $user = $this->verification();
        $data = ['prof'=>$user];
        return view('Administration/adminspage/type_enseignements/AjouTyp',$data);
    }
    function FormTypAjou(Request $requete){
        $requete->validate([
            "Nom"=>"Required",
            "coefficient"=>"Required"
        ]);
        $nom = $requete->Nom;
        $coefficient = $requete->coefficient;
        $donnees = ['nom_type_enseignement'=>$nom, 'coefficient'=>$coefficient];
        $insertion = DB::table('type_enseignements')->insert($donnees);
        if($insertion){
            $user = $this->verification();
            $data = ['prof'=>$user, 'succes'=>$insertion];
            return view('Administration/adminspage/type_enseignements/AjouTyp',$data);
        }
        else{
            return back()->with("Echec","Echec de l'insertion");
        }
    }
    function SuppTyp()
    {
        $user = $this->verification();
        $type = DB::table('type_enseignements')->get();
        $data = ['prof'=>$user,'type'=>$type];
        return view('Administration/adminspage/type_enseignements/SuppTyp',$data);
    }
    function FormTypSupp(Request $requete){
        $suppression = DB::table("type_enseignements")->where("id_type_enseignement", $requete->type)->delete();
        if($suppression){
            $user = $this->verification();
        $type = DB::table('type_enseignements')->get();
        $data = ['prof'=>$user,'type'=>$type, 'succes'=>$suppression];
        return view('Administration/adminspage/type_enseignements/SuppTyp',$data);
        }
        else{
            return back()->with("Echec","Echec de suppression");
        }
    }
    function ModTyp()
    {
        $user = $this->verification();
        $type = DB::table('type_enseignements')->get();
        $data = ['prof'=>$user,'type'=>$type];
        return view('Administration/adminspage/type_enseignements/ModTyp',$data);
    }
    function FormTypMod(Request $requete){
        $modification = DB::table("type_enseignements")->where("id_type_enseignement", $requete->type)->get();
        if($modification){
            $user = $this->verification();
            $type = DB::table('type_enseignements')->get();
        $data = ['prof'=>$user,'type'=>$type, "modification"=>$modification];
        return view('Administration/adminspage/type_enseignements/ModTyp',$data);
        }
    }
    function ModificationTyp(Request $requete){
        $nom = $requete->nom;
        $coefficient = $requete->coefficient;
        $id_type = $requete->id_type;
        $modif = DB::table("type_enseignements")->where('id_type_enseignement', $id_type)
        ->update(['nom_type_enseignement'=>$nom, 'coefficient'=>$coefficient]);
        if($modif){
            $user = $this->verification();
        $type = DB::table('type_enseignements')->get();
        $data = ['prof'=>$user,'type'=>$type, 'succes'=>$modif];
        return view('Administration/adminspage/type_enseignements/ModTyp',$data);
        }
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
    function FormPartAjou(Request $requete){
        $requete->validate([
            "Nbre_heure"=>"Required",
            "Nbre_grp"=>"Required"
        ]);
        $matieres = $requete->id_matiere;
        $type = $requete->type;
        $nbre_heure = $requete->Nbre_heure;
        $nbre_grp = $requete->Nbre_grp;
        $donnees = ['id_matiere'=>$matieres, 'type_enseignement'=>$type, 'nbre_heure'=>$nbre_heure, 'nbre_groupe'=>$nbre_grp];
        $insertion = DB::table('parties')->insert($donnees);
        if($insertion){
            $user = $this->verification();
        $matieres = DB::table('matieres')->leftjoin('semestres','matieres.id_semestre','=','semestres.id_semestre')
        ->leftjoin('niveau_etudes','semestres.id_niveau','=','niveau_etudes.id_niveau')
        ->get();
        $type = DB::table('type_enseignements')->get();
        $data = ['prof'=>$user,'matieres'=>$matieres,'type'=>$type, 'succes'=>$insertion];
        return view('Administration/adminspage/parties/AjouPart',$data);
        }
        else{
            return back()->with("Echec","Echec de l'insertion");
        }
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

    function FormPartSupp(Request $requete){
        $suppression= DB::table("parties")->where("id_partie", $requete->parties)->delete();

        if($suppression){

        $user = $this->verification();
        $parties = DB::table('parties')->leftjoin('matieres','parties.id_matiere','=','matieres.id_matiere')
        ->leftjoin('type_enseignements','parties.type_enseignement','=','type_enseignements.id_type_enseignement')
        ->leftjoin('semestres','matieres.id_semestre','=','semestres.id_semestre')
        ->leftjoin('niveau_etudes','semestres.id_niveau','=','niveau_etudes.id_niveau')
        ->get();
        $data = ['prof'=>$user,'parties'=>$parties, 'succes'=>$suppression];
        return view('Administration/adminspage/parties/SuppPart',$data);
        }
        else{
            return back()->with("Echec","Echec de suppression");
        }
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

    function FormPartMod(Request $requete){
        $modification = DB::table('parties')->where("id_partie", $requete->parties)->get();
        if($modification){
            $user = $this->verification();
        $parties = DB::table('parties')->leftjoin('matieres','parties.id_matiere','=','matieres.id_matiere')
        ->leftjoin('type_enseignements','parties.type_enseignement','=','type_enseignements.id_type_enseignement')
        ->leftjoin('semestres','matieres.id_semestre','=','semestres.id_semestre')
        ->leftjoin('niveau_etudes','semestres.id_niveau','=','niveau_etudes.id_niveau')
        ->get();
        $matieres = DB::table("matieres")->get();
        $type = DB::table("type_enseignements")->get();
        $data = ['prof'=>$user,'parties'=>$parties, "modification"=>$modification, "matieres"=>$matieres, "type"=>$type];
        return view('Administration/adminspage/parties/ModPart',$data);
        }
    }

    function ModificationPart(Request $requete){
        $matieres = $requete->matieres;
        $type = $requete->type;
        $nbre_heure = $requete->nbre_heure;
        $nbre_groupe = $requete->nbre_groupe;
        $id_partie = $requete->id_partie;
        $modif = DB::table('parties')->where('id_partie', $id_partie)
        ->update(['id_matiere'=>$matieres, 'type_enseignement'=>$type, 'nbre_heure'=>$nbre_heure, 'nbre_groupe'=>$nbre_groupe]);
        if($modif){
            $user = $this->verification();
        $parties = DB::table('parties')->leftjoin('matieres','parties.id_matiere','=','matieres.id_matiere')
        ->leftjoin('type_enseignements','parties.type_enseignement','=','type_enseignements.id_type_enseignement')
        ->leftjoin('semestres','matieres.id_semestre','=','semestres.id_semestre')
        ->leftjoin('niveau_etudes','semestres.id_niveau','=','niveau_etudes.id_niveau')
        ->get();
        $data = ['prof'=>$user,'parties'=>$parties, 'succes'=>$modif];
        return view('Administration/adminspage/parties/ModPart',$data);
        }
    }

}
