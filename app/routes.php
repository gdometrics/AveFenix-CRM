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
//Route::get('/home', 'HomeController@showWelcome');

Route::get('/', function()
{
	return View::make('pages.index');
}); 

Route::get('/home', function()
{
	return View::make('pages.home');
}); 
Route::get('/home/login', 'UsersController@getLogin');

Route::get('/home/register', function()
{
	return View::make('pages.register');
}); 

Route::controller('users', 'UsersController');

Route::controller('clients', 'ClientsController'); 

Route::controller('contacts', 'ContactsController');

Route::controller('status', 'StatusController');