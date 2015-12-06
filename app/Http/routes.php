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

// Home Contoller
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

// Auth Controller...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Usuario Controller
Route::get('administrativos', 'Sistema\UsuarioController@administrativos');
Route::get('docentes', 'Sistema\UsuarioController@docentes');
Route::get('alumnos', 'Sistema\UsuarioController@alumnos');
Route::get('usuario/create/{titulo}', 'Sistema\UsuarioController@create');
Route::post('usuario/store', 'Sistema\UsuarioController@store');
Route::get('usuario/edit/{id}', 'Sistema\UsuarioController@edit');
Route::post('usuario/update', 'Sistema\UsuarioController@update');
Route::get('usuario/destroy/{id}', 'Sistema\UsuarioController@destroy');