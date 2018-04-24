<?php

/**
 * @file web.php
 */

use App\cell_lines;

/* ----- GUEST PAGE ----- */

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





/* ----- ADMIN PAGE ----- */
// Session / Login
Route::get('/admin/login', 'SessionsController@create');
Route::post('/admin/login', 'SessionsController@store');

//Log out
Route::get('/admin/logout', 'SessionsController@destroy');

//Home Admin
Route::get('/admin/home', 'HomeController@index');

// Middleware AUTH
Auth::routes('/admin/home', 'HomeController@index');

//General : Home
Route::get('/admin/inbox', function(){
	return view("admin.layoutadmin", ["contentadmin"=>view('admin.inbox')]);
});
Route::get('/admin/calendar', function(){
	return view("admin.layoutadmin", ["contentadmin"=>view('admin.calendar')]);
});

//General : Contacts
	// Registration
Route::get('/admin/register', 'RegistrationController@create');
Route::post('/admin/register', 'RegistrationController@store');

Route::get('/admin/actual_admins', function(){
	return view("admin.layoutadmin", ["contentadmin"=>view('admin.actual_admins')]);	
});

//Database : View & Update
Route::get('/admin/database/view_tables', function() {
	return view("admin.layoutadmin", ["contentadmin"=>view('admin.view_tables')]);	
});
Route::get('/admin/database/update_data', function(){
	return view("admin.layoutadmin", ["contentadmin"=>view('admin.update_data')]);	
});

//Help
Route::get('/admin/help', function(){
	return view("admin.layoutadmin", ["contentadmin"=>view('admin.help')]);	
});