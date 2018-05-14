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
Route::resource('/biopsia', 'BiopsiaController');
Route::resource('/tipo-biopsia', 'TipoBiopsiaController');
Route::resource('/citologia', 'CitologiaController');
Route::resource('/tipo-citologia', 'TipoCitologiaController');
Route::resource('/cuentas', 'CuentaController');
Route::resource('/cheques', 'ChequeController');
//Precios
Route::get('/precios', 'PreciosController@index');
Route::get('/precios/create/{type}', 'PreciosController@create');
Route::post('/precios', 'PreciosController@store');
Route::get('/precios/{id}/edit', 'PreciosController@edit');
Route::put('/precios/{id}', 'PreciosController@update');
//Cuentas bancarias
Route::get('/cuenta-account/{id}', "CuentaFondosController@getCuentaAccount");
Route::post('/cuenta-account/{id}', "CuentaFondosController@postCuentaFunds");
//Cuenta doctor
Route::get('/doctor-account/{id}', "DoctorFondosController@getDoctorAccount");
Route::post('/doctor-account/{id}', "DoctorFondosController@postDoctorFunds");
Route::delete('doctor-account/delete/{id}', "DoctorFondosController@deleteDoctorFunds");
//Biopsias
Route::post('/biopsia-details/macro/{id}', 'BiopsiaDetailsController@macro');
Route::post('/biopsia-details/micro/{id}', 'BiopsiaDetailsController@micro');
Route::post('/biopsia-details/preliminar/{id}', 'BiopsiaDetailsController@preliminar');
Route::post('/biopsia-details/inmunohistoquimica/{id}', 'BiopsiaDetailsController@inmunohistoquimica');
Route::post('/biopsia-details/imagen/{id}', 'BiopsiaDetailsController@imagen');
Route::post('/biopsia-details/imagen/delete/{id}', 'BiopsiaDetailsController@imagenDelete');
Route::post('/biopsia-details/abono/{id}', 'BiopsiaDetailsController@abono');
Route::get('/biopsia-details/send/{id}', 'BiopsiaDetailsController@send');
//Citologia
Route::post('/citologia-details/micro/{id}', 'CitologiaDetailsController@micro');
Route::post('/citologia-details/preliminar/{id}', 'CitologiaDetailsController@preliminar');
Route::post('/citologia-details/imagen/{id}', 'CitologiaDetailsController@imagen');
Route::post('/citologia-details/abono/{id}', 'CitologiaDetailsController@abono');
Route::get('/citologia-details/send/{id}', 'CitologiaDetailsController@send');
