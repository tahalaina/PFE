<?php

use App\Http\Controllers\consomablecontroller;
use App\Http\Controllers\equipemntcontroller;
use App\Http\Controllers\etudiantcontroller;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\inscrirecontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\reservation;
use App\Http\Middleware\AuthMiddleware;
use App\Models\equipement;
use Illuminate\Support\Facades\Route;



Route::get('/',[logincontroller::class,'show']
)->name('show');

Route::post('/',[logincontroller::class,'login']
)->name('login');
///login 



Route::get('/inscrire',[inscrirecontroller::class,'show']
)->name('inscrire');
Route::post('/inscrire',[inscrirecontroller::class,'create']
)->name('inscrire.create');

Route::get('/inscrire/update',[inscrirecontroller::class,'update'])->name('inscrire.form');
Route::put('/inscrire/edite/{id}',[inscrirecontroller::class,'edit'])->name('inscrire.edite');

Route::get('/logout',[logincontroller::class,'logout'])->name('logout');
//s'incrire dans le site
Route::middleware([AuthMiddleware::class])->group(function () {




Route::get('/aide', function () {
    return view('aide');
})->name('aide');



//logout

Route::get('/home',[homecontroller::class,'index'])->name('home');

//home


Route::get('/equipement',[equipemntcontroller::class,'index'])->name('equipement');

//equipement shows

Route::get('/equipement/create',[equipemntcontroller::class,'create'])->name('create.equipement');

Route::post('/equipement/store',[equipemntcontroller::class,'store'])->name('ajouter.equipement');
 
//ajouter equipements

Route::delete('/equipement/delete/{id}',[equipemntcontroller::class,'delete'])->name('delete.equipmener');

//delete equipements
Route::get('/equipment/{id}/edit',[equipemntcontroller::class,'edit'])->name('edit.equipmener');

Route::put('/equipment/{id}',[equipemntcontroller::class,'update'])->name('update.equipmener');


//update equipements

Route::get('/equipement/plus/{id}',[equipemntcontroller::class,'plus'])->name('plus');

//plus sur l equipemnt

Route::get('/equipement/plagning/{id}',[equipemntcontroller::class,'plagnifier'])->name('plagnifier');
Route::post('/equipement/plagning/{id}',[equipemntcontroller::class,'plagnifierexecute'])->name('execute');

//plaging de reservation tous les equipements

Route::get('/reservation/plagning',[reservation::class,'index'])->name('index.equipement');
Route::post('/reservation',[reservation::class,'store'])->name('equipemntstore');

//plaging de reservation

Route::get('/mesreservation',[reservation::class,'show'])->name('reservation.show');

//mes reservation



//recherche reservations

Route::delete('/reservation/annuler/{id}',[reservation::class,'annuler'])->name('annuler');

//annuler mes reservation

Route::get('/reservation/{id}/edit', [reservation::class, 'edit'])->name('reservation.edit');
Route::post('/reservation/update/{id}', [reservation::class, 'update'])->name('reservation.updat');

//modifier mes reservation
Route::get('/equipments/search', [equipemntcontroller::class, 'search'])->name('equipments.search');

//searche equipement

Route::get('/login/forget',[logincontroller::class,'forget'])->name('forget');
Route::post('/login/forget',[logincontroller::class,'sendforget'])->name('send');

//forgetemail
Route::put('/reservation/{id}', [reservation::class, 'update2'])->name('reservation.update');


Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

//progfile utilisateur


Route::get('/utilisateur', [etudiantcontroller::class,'index'])->name('utiliosateur.index');
Route::delete('/utilisateur/supprimer/{id}',[etudiantcontroller::class,'destroy'])->name('delete.user');

//getion utilisateurs

Route::get('/consommable',[consomablecontroller::class,'index'])->name('consomable');
Route::delete('/consommable/supprimer/{id}',[consomablecontroller::class,'destroy'])->name('delete.consommable');
Route::get('/consommable/recherch',[consomablecontroller::class,'recheche'])->name('recheche');
Route::post('/consommable/ajouter',[consomablecontroller::class,'store'])->name('ajouter.consommable');
//gestion de consommables

Route::get('/reservation/recherche', [reservation::class, 'recherch55'])->name('recherche.equipements');

//reherche mes reservations

Route::get('/tracabilite',[reservation::class,'historique'])->name('historique');

Route::get('/tracabilite/recherche',[reservation::class,'recherche'])->name('recherche.historique');


//historique of equipemnts


Route::put('/etudiant/update/{id}',[etudiantcontroller::class,'update'])->name('etudiants.update');
});
