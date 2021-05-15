<?php

use App\Http\Controllers\ControleurAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControleurConnexion;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[ControleurConnexion::class,'connexion'])->middleware("dejaConnecte");
Route::post('Connecter',[ControleurConnexion::class,'login'])->name('Connex.verif');
Route::get('profile',[ControleurConnexion::class,'profile'])->middleware("estConnecte");
Route::get('logout',[ControleurConnexion::class,'logout']);
Route::get('/supadmin',[ControleurConnexion::class,'supadmin']);
Route::get('admin',[ControleurConnexion::class,'admin']);
Route::get('Ajout',[ControleurAdmin::class,'ajouter']);
Route::get('Supp',[ControleurAdmin::class,'Supprimer']);
Route::get('Modi',[ControleurAdmin::class,'Modifier']);
Route::post('listeAdm',[ControleurAdmin::class,'listing']);
Route::get('feuille',[ControleurConnexion::class,'feuille']);
Route::post('AjoutEnvoi',[ControleurAdmin::class,'AjoutEnvoi']);
Route::post('SuppEnvoi',[ControleurAdmin::class,'SuppEnvoi']);
Route::post('ModiEnvoi',[ControleurAdmin::class,'ModiEnvoi']);
Route::get('AjoutDep',[ControleurAdmin::class,'AjoutDep']);
Route::get('SuppDep',[ControleurAdmin::class,'SuppDep']);
Route::get('ModiDep',[ControleurAdmin::class,'ModiDep']);
Route::post('listeDep',[ControleurAdmin::class,'listeDep']);
Route::post('AjouDepForm',[ControleurAdmin::class,'AjouDepForm']);
Route::post('SuppDepForm',[ControleurAdmin::class,'SuppDepForm']);
Route::post('ModDepForm',[ControleurAdmin::class,'ModDepForm']);
Route::post('ValidationMod',[ControleurAdmin::class,'ValidationMod']);
Route::get('niveauEtudes', [ControleurConnexion::class, 'niveauEtudes'])->name('niveauEtudes');
Route::get('semestres', [ControleurConnexion::class, 'semestres'])->name('semestres');

