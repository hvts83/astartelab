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
Route::resource('/pacientes', 'PacienteController');
Route::resource('/doctores', 'DoctorController');
Route::resource('/grupos', 'GrupoController');
Route::resource('/diagnosticos', 'DiagnosticoController');
Route::resource('/frases', 'FraseController');
