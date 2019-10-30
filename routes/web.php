<?php

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

Route::get('/', function () {
    return view('auth.login');
});
//Route::get('','LoginController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/pres', 'PrescrireController@store')->name('pres');

Route::resource('dette','DetteController');
Route::resource('diver','DiverController');
Route::resource('ordonance','OrdonanceController');
Route::resource('patient','PatientController');
Route::resource('prescrire','PrescrireController');
Route::resource('lit','LitController');
Route::resource('consultation','ConsultationController');
Route::resource('chambre','ChambreController');
Route::resource('constante','ConstanteController');
Route::resource('honoraire','HonoraireController');
Route::resource('hospitalisation','HospitalisationController');
Route::resource('personnel','PersonnelController');
Route::resource('produit','ProduitController');
Route::resource('rendez_vous','Rendez_vousController');
Route::resource('type_honoraire','Type_honoraireController');
Route::resource('connexion','connexionController');
Route::resource('soin','SoinController');

