<?php

/**
 * @file web.php
 */

use App\cell_lines;

//Index
Route::get('/', 'HomePageController@index');

//Results
Route::get('/cell/{name}', 'CellineController@index');
Route::get('/gene/{name}', 'GeneController@index');

//About include form for contacting us
Route::get('/about_us', function() {
	return view("layout", ["menu" => "about", "content" => view('about_us')]);
});


Route::get('/data', function() {
	return view("layout", ["menu" => "data", "content" => view('data')]);
});

Route::get('/cellection/query', 'QueryController@index');
Route::get('/error', function(){
	return view("layout", ["menu" => "home", "content" => view('error')]);
});

Route::get('/classification_info', function(){
	return view("layout", ["menu" => "home", "content" => view('info_classif')]);
});

Auth::routes('/home', 'HomeController@index');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');

Route::get('/home', 'HomeController@index')->name('home');