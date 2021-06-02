<?php

use App\Http\Controllers\ControleurAdmin;
use App\Http\Controllers\ControleurSupAdmin;
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
Route::get('Ajout',[ControleurSupAdmin::class,'ajouter'])->middleware("estConnecte");
Route::get('Supp',[ControleurSupAdmin::class,'Supprimer'])->middleware("estConnecte");
Route::get('Modi',[ControleurSupAdmin::class,'Modifier'])->middleware("estConnecte");
Route::get('feuille',[ControleurConnexion::class,'feuille'])->middleware("estConnecte");
Route::post('AjoutEnvoi',[ControleurSupAdmin::class,'AjoutEnvoi'])->middleware("estConnecte");
Route::post('SuppEnvoi',[ControleurSupAdmin::class,'SuppEnvoi'])->middleware("estConnecte");
Route::post('ModiEnvoi',[ControleurSupAdmin::class,'ModiEnvoi'])->middleware("estConnecte");
Route::post('ValidationMod',[ControleurSupAdmin::class,'ValidationMod'])->middleware("estConnecte");
Route::get('AjoutDep',[ControleurSupAdmin::class,'AjoutDep'])->middleware("estConnecte");
Route::get('SuppDep',[ControleurSupAdmin::class,'SuppDep'])->middleware("estConnecte");
Route::get('ModiDep',[ControleurSupAdmin::class,'ModiDep'])->middleware("estConnecte");
Route::post('AjouDepForm',[ControleurSupAdmin::class,'AjouDepForm'])->middleware("estConnecte");
Route::post('SuppDepForm',[ControleurSupAdmin::class,'SuppDepForm'])->middleware("estConnecte");
Route::post('ModDepForm',[ControleurSupAdmin::class,'ModDepForm'])->middleware("estConnecte");
Route::post('ModificationDep',[ControleurSupAdmin::class,'ModificationDep'])->middleware("estConnecte");
Route::get('AjouStat',[ControleurAdmin::class,'AjouStat'])->middleware("estConnecte");
Route::get('SuppStat',[ControleurAdmin::class,'SuppStat'])->middleware("estConnecte");
Route::get('ModStat',[ControleurAdmin::class,'ModStat'])->middleware("estConnecte");
Route::get('AjouProf',[ControleurAdmin::class,'AjouProf'])->middleware("estConnecte");
Route::get('SuppProf',[ControleurAdmin::class,'SuppProf'])->middleware("estConnecte");
Route::get('ModProf',[ControleurAdmin::class,'ModProf'])->middleware("estConnecte");
Route::get('AjouNiv',[ControleurAdmin::class,'AjouNiv'])->middleware("estConnecte");
Route::get('SuppNiv',[ControleurAdmin::class,'SuppNiv'])->middleware("estConnecte");
Route::get('ModNiv',[ControleurAdmin::class,'ModNiv'])->middleware("estConnecte");
Route::get('AjouCat',[ControleurAdmin::class,'AjouCat'])->middleware("estConnecte");
Route::get('SuppCat',[ControleurAdmin::class,'SuppCat'])->middleware("estConnecte");
Route::get('ModCat',[ControleurAdmin::class,'ModCat'])->middleware("estConnecte");
Route::get('AjouSem',[ControleurAdmin::class,'AjouSem'])->middleware("estConnecte");
Route::get('SuppSem',[ControleurAdmin::class,'SuppSem'])->middleware("estConnecte");
Route::get('ModSem',[ControleurAdmin::class,'ModSem'])->middleware("estConnecte");
Route::get('AjouMat',[ControleurAdmin::class,'AjouMat'])->middleware("estConnecte");
Route::get('SuppMat',[ControleurAdmin::class,'SuppMat'])->middleware("estConnecte");
Route::get('ModMat',[ControleurAdmin::class,'ModMat'])->middleware("estConnecte");
Route::get('AjouTyp',[ControleurAdmin::class,'AjouTyp'])->middleware("estConnecte");
Route::get('SuppTyp',[ControleurAdmin::class,'SuppTyp'])->middleware("estConnecte");
Route::get('ModTyp',[ControleurAdmin::class,'ModTyp'])->middleware("estConnecte");
Route::get('AjouPart',[ControleurAdmin::class,'AjouPart'])->middleware("estConnecte");
Route::get('SuppPart',[ControleurAdmin::class,'SuppPart'])->middleware("estConnecte");
Route::get('ModPart',[ControleurAdmin::class,'ModPart'])->middleware("estConnecte");
Route::post('FormStatAjou',[ControleurAdmin::class,'FormStatAjou'])->middleware("estConnecte");
Route::post('FormStatMod',[ControleurAdmin::class,'FormStatMod'])->middleware("estConnecte");
Route::post('FormStatSupp',[ControleurAdmin::class,'FormStatSupp'])->middleware("estConnecte");
Route::post('ModificationStat',[ControleurAdmin::class,'ModificationStat'])->middleware("estConnecte");
Route::post('FormProfAjou',[ControleurAdmin::class,'FormProfAjou'])->middleware("estConnecte");
Route::post('FormProfSupp',[ControleurAdmin::class,'FormProfSupp'])->middleware("estConnecte");
Route::post('FormProfMod', [ControleurAdmin::class,'FormProfMod'])->middleware("estConnecte");
Route::post('ModificationProf',[ControleurAdmin::class,'ModificationProf'])->middleware("estConnecte");
Route::post('FormNivAjou',[ControleurAdmin::class,'FormNivAjou'])->middleware("estConnecte");
Route::post('FormNivSupp',[ControleurAdmin::class,'FormNivSupp'])->middleware("estConnecte");
Route::post('FormNivMod', [ControleurAdmin::class,'FormNivMod'])->middleware("estConnecte");
Route::post('ModificationNiv',[ControleurAdmin::class,'ModificationNiv'])->middleware("estConnecte");
Route::post('FormCatAjou',[ControleurAdmin::class,'FormCatAjou'])->middleware("estConnecte");
Route::post('FormCatSupp',[ControleurAdmin::class,'FormCatSupp'])->middleware("estConnecte");
Route::post('FormCatMod', [ControleurAdmin::class,'FormCatMod'])->middleware("estConnecte");
Route::post('ModificationCat',[ControleurAdmin::class,'ModificationCat'])->middleware("estConnecte");
Route::post('FormSemAjou',[ControleurAdmin::class,'FormSemAjou'])->middleware("estConnecte");
Route::post('FormSemSupp',[ControleurAdmin::class,'FormSemSupp'])->middleware("estConnecte");
Route::post('FormSemMod', [ControleurAdmin::class,'FormSemMod'])->middleware("estConnecte");
Route::post('ModificationSem',[ControleurAdmin::class,'ModificationSem'])->middleware("estConnecte");
Route::post('FormMatAjou',[ControleurAdmin::class,'FormMatAjou'])->middleware("estConnecte");
Route::post('FormMatSupp',[ControleurAdmin::class,'FormMatSupp'])->middleware("estConnecte");
Route::post('FormMatMod', [ControleurAdmin::class,'FormMatMod'])->middleware("estConnecte");
Route::post('ModificationMat',[ControleurAdmin::class,'ModificationMat'])->middleware("estConnecte");
Route::post('FormTypAjou',[ControleurAdmin::class,'FormTypAjou'])->middleware("estConnecte");
Route::post('FormTypSupp',[ControleurAdmin::class,'FormTypSupp'])->middleware("estConnecte");
Route::post('FormTypMod', [ControleurAdmin::class,'FormTypMod'])->middleware("estConnecte");
Route::post('ModificationTyp',[ControleurAdmin::class,'ModificationTyp'])->middleware("estConnecte");
Route::post('FormPartAjou',[ControleurAdmin::class,'FormPartAjou'])->middleware("estConnecte");
Route::post('FormPartSupp',[ControleurAdmin::class,'FormPartSupp'])->middleware("estConnecte");
Route::post('FormPartMod', [ControleurAdmin::class,'FormPartMod'])->middleware("estConnecte");
Route::post('ModificationPart',[ControleurAdmin::class,'ModificationPart'])->middleware("estConnecte");
Route::get('/Categorie', [ControleurConnexion::class, 'Categorie']);
Route::get('/niveauEtude', [ControleurConnexion::class, 'niveauEtude']);
Route::get('/Semestre', [ControleurConnexion::class,'Semestre']);
Route::get('/EnregistrerAff',[ControleurConnexion::class,'EnregistrerAff']);
Route::get('/infosprofs',[ControleurConnexion::class,"infosprofs"]);

