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


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
	Route::group(['prefix' => 'users'], function(){
		Route::get('list', 			['as' => 'admin.users.list', 	'uses' => "UsersController@index"]);
		Route::get('create', 		['as' => 'admin.users.create', 	'uses' => "UsersController@create"]);
		Route::get('edit/{user}',	['as' => 'admin.users.edit', 	'uses' => "UsersController@edit"]);
		Route::get('delete/{user}', ['as' => 'admin.users.delete', 	'uses' => "UsersController@delete"]);

		Route::post('store', 		['as' => 'admin.users.store', 	'uses' => "UsersController@store"]);
		Route::post('update/{user}',['as' => 'admin.users.update', 	'uses' => "UsersController@update"]);
	});

	Route::group(['prefix' => 'roles'], function(){
		Route::get('list', 				['as' => 'admin.roles.list', 	'uses' => "RolesController@index"]);
		Route::get('create', 			['as' => 'admin.roles.create', 	'uses' => "RolesController@create"]);
		Route::get('edit/{role}',		['as' => 'admin.roles.edit', 	'uses' => "RolesController@edit"]);
		Route::get('delete/{role}',		['as' => 'admin.roles.delete', 	'uses' => "RolesController@delete"]);

		Route::post('store', 			['as' => 'admin.roles.store', 	'uses' => "RolesController@store"]);
		Route::post('update/{role}',	['as' => 'admin.roles.update', 	'uses' => "RolesController@update"]);
	});

	Route::group(['prefix' => 'groups'], function(){
		Route::get('list', 				['as' => 'admin.groups.list', 	'uses' => "GroupsController@index"]);
		Route::get('create', 			['as' => 'admin.groups.create', 'uses' => "GroupsController@create"]);
		Route::get('edit/{group}',		['as' => 'admin.groups.edit', 	'uses' => "GroupsController@edit"]);
		Route::get('delete/{group}',	['as' => 'admin.groups.delete', 'uses' => "GroupsController@delete"]);

		Route::post('store', 			['as' => 'admin.groups.store', 	'uses' => "GroupsController@store"]);
		Route::post('update/{group}',	['as' => 'admin.groups.update', 'uses' => "GroupsController@update"]);
	});

	Route::group(['prefix' => 'prototypes'], function(){
		Route::get('list', 					['as' => 'admin.prototypes.list', 	'uses' => 'PrototypesController@index']);
		Route::get('create',				['as' => 'admin.prototypes.create', 'uses' => 'PrototypesController@create']);
		Route::post('store',				['as' => 'admin.prototypes.store', 	'uses' => 'PrototypesController@store']);
		Route::get('edit/{prototype}',		['as' => 'admin.prototypes.edit', 	'uses' => 'PrototypesController@edit']);
		Route::post('update/{prototype}',	['as' => 'admin.prototypes.update', 'uses' => 'PrototypesController@update']);
		Route::get('destroy/{prototype}',	['as' => 'admin.prototypes.destroy','uses' => 'PrototypesController@destroy']);

		Route::get('{prototype}/question/create' , 	['as' => 'admin.questions.create', 	'uses' => 'QuestionsController@create']);
		Route::post('{prototype}/question/store' , 	['as' => 'admin.questions.store', 	'uses' => 'QuestionsController@store']);
	});

	Route::group(['prefix' => 'question'], function(){

		Route::get('edit/{question}' , 				['as' => 'admin.questions.edit', 	'uses' => 'QuestionsController@edit']);
		Route::post('update/{question}' , 			['as' => 'admin.questions.update', 	'uses' => 'QuestionsController@update']);
		Route::post('delete/{question}' , 			['as' => 'admin.questions.delete', 	'uses' => 'QuestionsController@delete']);
	});
});

Route::group(['prefix' => 'rest', 'namespace' => 'REST'], function(){
	Route::group(['prefix' => 'users'], function(){
		Route::get('', 'UsersController@index');
		Route::get('{user}', 'UsersController@show');

		Route::post('', 'UsersController@store');

		Route::put('{user}', 'UsersController@update');

		Route::delete('{user}', 'UsersController@destroy');

	});
});

Route::group(['namespace' => 'Client'], function(){
	Route::group(['prefix' => 'auth'], function(){
		Route::get('register', 	['as' => 'client.auth.register', 	'uses' => 'AuthController@registerForm']);
		Route::get('login', 	['as' => 'client.auth.login', 		'uses' => 'AuthController@loginForm']);
	});

	Route::get('', ['middleware' => 'auth', 'as' => 'client.cabinet', 'uses' => 'CabinetController@cabinet']);
});