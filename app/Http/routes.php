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

Route::group(['prefix' => 'api'], function () {
	Route::post('auth/login', 'Api\AuthController@authenticate');

	Route::group(['middleware' => ['api', 'cors', 'jwt.auth']], function(){
		Route::resource('customer', 'Api\CustomerController');
		Route::resource('project', 'Api\ProjectController');
		Route::resource('range', 'Api\RangeController');
		Route::resource('product', 'Api\ProductController');
		Route::resource('module', 'Api\ModuleController');
		Route::resource('modulenature', 'Api\ModulenatureController');
	});
});

Route::group(['middleware' => ['web']], function () {

	Route::group(['prefix' => 'docs'], function () {
		Route::get('/', 'Docs\StaticPages@home');
		Route::get('auth', 'Docs\StaticPages@auth');
		Route::get('clients', 'Docs\StaticPages@customers');
		Route::get('projets', 'Docs\StaticPages@projects');
		Route::get('gammes', 'Docs\StaticPages@ranges');
		Route::get('produits', 'Docs\StaticPages@products');
		Route::get('natures-module', 'Docs\StaticPages@naturesModule');
		Route::get('modules', 'Docs\StaticPages@modules');
	});
	
});


