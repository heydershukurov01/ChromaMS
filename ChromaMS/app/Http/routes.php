<?php

Route::controller('auth/password' , 'Auth\PasswordController' , [
	'getEmail'=> 'auth.password.email',
	'getReset'=> 'auth.password.reset',

	]);
// Routing for Users
Route::get('backend/users/{users}/confirm' , ['as' => 'backend.users.confirm' , 'uses' => 'Backend\UsersController@confirm']);
Route::resource('backend/users' , 'Backend\UsersController'	, ['except' => ['show']]);
// Routing for Pages 
Route::get('backend/pages/{pages}/confirm' , ['as' => 'backend.pages.confirm' , 'uses' => 'Backend\PagesController@confirm']);
Route::resource('backend/pages' , 'Backend\PagesController' , ['except' => ['show']]);
// Routing for Blog Posts 
Route::get('backend/blog/{blog}/confirm' , ['as' => 'backend.blog.confirm' , 'uses' => 'Backend\BlogController@confirm']);
Route::resource('backend/blog' , 'Backend\BlogController');	


Route::controller('auth', 'Auth\AuthController' , [
	'getLogin'=>'auth.login',
	'getLogout'=>'auth.logout'
	]);

Route::get('backend/dashboard', ['as'=>'backend.dashboard','uses'=>'Backend\DashboardController@index']);
