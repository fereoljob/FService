<?php

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
Route::get('/admin',[ControleurAdmin::class,'Admin']);