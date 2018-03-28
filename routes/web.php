<?php

/**
 * @file web.php
 */

use App\cell_lines;

Route::get('/', 'HomePageController@index');
Route::get('/cell/{name}', 'CellineController@index');
Route::get('/gene/{name}', 'GeneController@index');
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