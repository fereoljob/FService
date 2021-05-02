<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Departement;
use App\Models\NiveauEtude;

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
                $requete->session()->put('LoggedUser',$user->id_user);
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
    }
    function profile()
    {
        if(session()->has('LoggedUser'))
        {
            $user = User::where('id_user','=',session('LoggedUser'))->first();
            $categories = NiveauEtude::DISTINCT()->get(['categorie']);
            $licences = NiveauEtude::where('categorie', '=','Licences')->get();
            $masters = NiveauEtude::where('categorie', '=','Masters')->get();
            $autres = NiveauEtude::where('categorie', '=','Autres Services')->get();
            $data=['infoConnexionUser'=>$user, 'categoriesnom'=>$categories,
                    'licences'=>$licences, 'masters'=> $masters,
                    'autres' => $autres];
        }
        return view('Utilisateur/profile',$data);
    }

}
