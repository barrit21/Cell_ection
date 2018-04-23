<?php

/**
 * @file web.php
 */

use App\cell_lines;

// Index
Route::get('/', 'HomePageController@index');

// Results
Route::get('/cell/{name}', 'CellineController@index');
Route::get('/gene/{name}', 'GeneController@index');

//Contact us
Route::get('/contact_us', 'ContactController@create')->name('createcontact');
Route::post('/contact_us', 'ContactController@store')->name('storecontact');

//About us
Route::get('/about_us', function(){
	return view("layout", ["menu" => "about", "content" => view('about_us')]);
});


// Onglet data en attente de contenu ???
Route::get('/data', function() {
	return view("layout", ["menu" => "data", "content" => view('data')]);
});

// Request on search bar
Route::get('/cellection/query', 'QueryController@index');

// Error page
Route::get('/error', function(){
	return view("layout", ["menu" => "home", "content" => view('error')]);
});

// Classification page
Route::get('/classification_info', function(){
	return view("layout", ["menu" => "home", "content" => view('info_classif')]);
});

// Middleware AUTH
Auth::routes('/home', 'HomeController@index');

// Registration
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

// Session
Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');

//Log out
Route::get('/logout', 'SessionsController@destroy');

//Home Admin
Route::get('/home', 'HomeController@index')->name('home');