<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'MainController@index');
//Route::get('/', 'UserController@index');
Route::get('login', 'UserController@index');
Route::post('login', 'UserController@login');

Route::get('registro', 'UserController@create');
Route::post('registro', 'UserController@store');
Route::get('logout', 'UserController@logout');
Route::get('auth', 'UserController@isLogged');

//Route::get('publica', 'HomeController@publica');

Route::group(array('before' => 'auth'), function () {
	Route::get('tasks', 'TaskController@index');
	Route::get('traer', 'TaskController@traerTareas');
	Route::get('create', 'TaskController@create');
	Route::post('create', 'TaskController@store');
	Route::get('Tasks/{id}/edit', 'TaskController@edit');
	Route::post('Tasks/{id}/update', 'TaskController@update');
	Route::get('Tasks/{id}/delete', 'TaskController@destroy');
	Route::post('Actualizar', 'TaskController@actualizarEstado');


});

