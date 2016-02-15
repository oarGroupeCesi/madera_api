<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

	Route::group(['prefix' => 'api', 'middleware' => ['cors']], function () {
		Route::post('login', 'Api\AuthController@authenticate');
		Route::resource('customer', 'Api\CustomerController');
		Route::resource('project', 'Api\ProjectController');
		Route::resource('range', 'Api\RangeController');
		Route::resource('product', 'Api\ProductController');
	});
	
});


