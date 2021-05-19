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
Route::get('/supadmin',[ControleurConnexion::class,'supadmin'])->middleware("estConnecte")->middleware("estsupadmin");
Route::get('admin',[ControleurConnexion::class,'admin'])->middleware("estConnecte")->middleware("estadmin");
Route::get('Ajout',[ControleurAdmin::class,'ajouter'])->middleware("estConnecte");
Route::get('Supp',[ControleurAdmin::class,'Supprimer'])->middleware("estConnecte");
Route::get('Modi',[ControleurAdmin::class,'Modifier'])->middleware("estConnecte");
Route::get('feuille',[ControleurConnexion::class,'feuille'])->middleware("estConnecte");
Route::post('AjoutEnvoi',[ControleurAdmin::class,'AjoutEnvoi'])->middleware("estConnecte");
Route::post('SuppEnvoi',[ControleurAdmin::class,'SuppEnvoi'])->middleware("estConnecte");
Route::post('ModiEnvoi',[ControleurAdmin::class,'ModiEnvoi'])->middleware("estConnecte");
Route::post('ValidationMod',[ControleurAdmin::class,'ValidationMod'])->middleware("estConnecte");
Route::get('AjoutDep',[ControleurAdmin::class,'AjoutDep'])->middleware("estConnecte");
Route::get('SuppDep',[ControleurAdmin::class,'SuppDep'])->middleware("estConnecte");
Route::get('ModiDep',[ControleurAdmin::class,'ModiDep'])->middleware("estConnecte");
Route::post('AjouDepForm',[ControleurAdmin::class,'AjouDepForm'])->middleware("estConnecte");
Route::post('SuppDepForm',[ControleurAdmin::class,'SuppDepForm'])->middleware("estConnecte");
Route::post('ModDepForm',[ControleurAdmin::class,'ModDepForm'])->middleware("estConnecte");
Route::post('ModificationDep',[ControleurAdmin::class,'ModificationDep'])->middleware("estConnecte");