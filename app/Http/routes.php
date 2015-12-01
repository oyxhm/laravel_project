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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('about','PageController@about');

// Route::get('article','ArticleController@index');

// Route::get('article/create','ArticleController@create');

// Route::get('article/test','ArticleController@test');

// Route::post('article','ArticleController@store');

// Route::get('article/{id}','ArticleController@show');

// Route::get('article/{id}/edit','ArticleController@edit');

Route::get('article/test','ArticleController@test');

Route::get('about',['middleware' => 'auth',function(){
	return 'log in then show';
}]);

Route::resource('article','ArticleController');
