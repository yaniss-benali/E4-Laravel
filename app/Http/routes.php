<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});
// Afficher formulaire //
Route::get('/getLogin', 'UtilisateurController@getLogin');
// Connexion à partir des trucs saisis //
Route::post('/login','UtilisateurController@signIn');
// Deconnexion //
Route::get('/getLogout', 'UtilisateurController@signOut');

Route::get('/listeFrais', 'FraisController@getFraisVisiteur');
Route::get('/getListeFrais', 'FraisController@getFraisVisiteur');
Route::get('/modifierFrais/{id}','FraisController@updateFrais');
Route::post('/validerFrais','FraisController@validateFrais');

Route::get('/ajouterFrais','FraisController@addFrais');

Route::get('/supprimerFrais/{id}','FraisController@supprimeFrais');

// Frais hors forfait //
Route::get('/listeFraisHorsForfait', 'FraisHorsForfaitController@getFraisHorsForfaitFrais');
Route::get('/getListeFraisHorsForfait/{id}', 'FraisHorsForfaitController@getFraisHorsForfaitFrais');
Route::get('/modifierFraisHorsForfait/{id}','FraisHorsForfaitController@updateFraisHorsForfait');
Route::post('/validerFraisHorsForfait/','FraisHorsForfaitController@validateFraisHorsForfait');

Route::get('/ajouterFraisHorsForfait/{id}','FraisHorsForfaitController@addFraisHorsForfait');
Route::get('/supprimerFraisHorsForfait/{id}','FraisHorsForfaitController@supprimeFraisHorsForfait');
//Route::get('/getListeFraisHorsForfait', 'FraisHorsForfaitController@getFraisHorsForfait');