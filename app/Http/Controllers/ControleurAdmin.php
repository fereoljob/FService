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
        return view('Administration/Formulaire1',$data);
    }
    function Supprimer()
    {
        $user=$this->verification();
        $data=['infoConnexionUser'=>$user];
        return view('Administration/Formulaire2',$data);
    }
    function Modifier()
    {
        $user=$this->verification();
        $data=['infoConnexionUser'=>$user];
        return view('Administration/Formulaire3',$data);
    }
    
    function listing(Request $requete)
    {
            $userC=$this->verification();
            $val= $requete->table;
            $user = DB::table('users')->where($val,'1')->get();
            return view('Administration/Formulaire3',['liste'=>$user,'infoConnexionUser'=>$userC]);
    }
   
    function AjoutEnvoi(Request $requete)
    {
        $user = $this->verification();
        $data=['infoConnexionUser'=>$user];
        //validation de la requete
        $requete->validate([
            
        ]);

    }
    function SuppEnvoi()
    {

    }
    function ModiEnvoi()
    {

    }
}
