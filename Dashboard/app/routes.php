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
Route::get('login', 'MainController@login');
Route::post('login', 'MainController@verificarLogin');
Route::get('registro', 'MainController@registro');
