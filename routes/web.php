
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/register', function() {
	return view('errors.401');
});

Route::get('/', ['middleware'=>'auth', 'uses'=>'UserController@index']);

Route::post('/verify', ['middleware'=>'auth', 'uses'=>'UserController@verify']);

//Route::post('/profile', ['middleware'=>'auth', 'uses'=>'UserController@viewprofile']);

/*Route::get('/profile/{id}', function() {
	return view('profile.profile');
});*/

Route::get('/profile/{id}', ['middleware'=>'auth', 'uses'=>'UserController@viewprofile']);