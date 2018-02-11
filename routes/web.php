<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name("main");
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/usuarios', 'UsuarioController');
Route::resource('/pacientes', 'PacienteController');
Route::resource('/doctores', 'DoctorController');
Route::resource('/grupos', 'GrupoController');
Route::resource('/diagnosticos', 'DiagnosticoController');
Route::resource('/frases', 'FraseController');
Route::resource('/precios', 'PreciosController');
Route::resource('/biopsia', 'BiopsiaController');
Route::resource('/citologia', 'CitologiaController');
//Cuenta doctor
Route::get('/doctor-account/{id}', "DoctorFondosController@getDoctorAccount" );
Route::post('/doctor-account/{id}', "DoctorFondosController@postDoctorFunds");
//Biopsias
Route::post('/biopsia-details/macro/{id}', 'BiopsiaDetailsController@macro');
Route::post('/biopsia-details/micro/{id}', 'BiopsiaDetailsController@micro');
Route::post('/biopsia-details/preliminar/{id}', 'BiopsiaDetailsController@preliminar');
Route::post('/biopsia-details/inmunohistoquimica/{id}', 'BiopsiaDetailsController@inmunohistoquimica');
Route::post('/biopsia-details/inmunohistoquimica_imagen/{id}', 'BiopsiaDetailsController@inmunohistoquimica_imagen');
Route::post('/biopsia-details/abono/{id}', 'BiopsiaDetailsController@abono');
Route::get('/biopsia-details/send/{id}', 'BiopsiaDetailsController@send');
//Citologia
Route::post('/citologia-details/micro/{id}', 'CitologiaDetailsController@micro');
Route::post('/citologia-details/preliminar/{id}', 'CitologiaDetailsController@preliminar');
Route::post('/citologia-details/imagen/{id}', 'CitologiaDetailsController@imagen');
Route::post('/citologia-details/abono/{id}', 'CitologiaDetailsController@abono');
Route::get('/citologia-details/send/{id}', 'CitologiaDetailsController@send');
