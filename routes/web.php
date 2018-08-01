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
Route::post('/biopsia-details/primer_pago/{id}', 'BiopsiaDetailsController@primer_pago');
//Citologia
Route::post('/citologia-details/macro/{id}', 'CitologiaDetailsController@macro');
Route::post('/citologia-details/micro/{id}', 'CitologiaDetailsController@micro');
Route::post('/citologia-details/preliminar/{id}', 'CitologiaDetailsController@preliminar');
Route::post('/citologia-details/imagen/{id}', 'CitologiaDetailsController@imagen');
Route::post('/citologia-details/abono/{id}', 'CitologiaDetailsController@abono');
Route::get('/citologia-details/send/{id}', 'CitologiaDetailsController@send');
Route::post('/citologia-details/primer_pago/{id}', 'CitologiaDetailsController@primer_pago');
//Reportes
Route::get('/reportes/biopsia', 'TablasController@biopsia');
Route::get('/reportes/citologia', 'TablasController@citologia');
Route::get('/reportes/informe-biopsia', 'TablasController@informeBiopsia');
Route::get('/reportes/biopsia-doctor', 'TablasController@biopsiaDoctor');
Route::get('/reportes/informe-citologia', 'TablasController@informeCitologia');
Route::get('/reportes/citologia-doctor', 'TablasController@citologiaDoctor');
Route::get('/reportes/grupo', 'TablasController@grupo');
Route::get('/reportes/ingresos', 'TablasController@ingresos');
Route::get('/reportes/pendientes', 'TablasController@pendientes');
Route::get('/reportes/prepagados', 'TablasController@prepagados');
Route::get('/reportes/control-diario', 'TablasController@controldiario');
//Impresiones
Route::get('/biopsia/{id}/pdf', 'BiopsiaController@pdf');
Route::get('/biopsia/{id}/print', 'BiopsiaController@print');
Route::get('/biopsia/{id}/sm', 'BiopsiaController@sm');
Route::get('/biopsia/{id}/envelope', 'BiopsiaController@envelope');
Route::get('/citologia/{id}/pdf', 'CitologiaController@pdf');
Route::get('/citologia/{id}/print', 'CitologiaController@print');
Route::get('/citologia/{id}/sm', 'CitologiaController@sm');
Route::get('/citologia/{id}/envelope', 'CitologiaController@envelope');