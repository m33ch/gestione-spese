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


Route::get('login',   array('as' => 'login', 'uses' => 'AuthController@getLogin'));
Route::post('login',  'AuthController@postLogin');
Route::get('logout',   'AuthController@getLogout');

// Secure-Routes
Route::group(array('before' => 'auth'), function()
{
	// Routes for Dashboard
	Route::get('/',   array('as' => 'dashboard', 'uses' => 'HomeController@showWelcome'));
	
	// Routes for UserController
	Route::group(array('prefix' => 'user'), function()
	{

	    Route::get('/', 'UserController@index');
		Route::get('create', 'UserController@create');

	});

});