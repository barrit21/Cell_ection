<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\cell_lines;

Route::get('/', 'HomePageController@index');
Route::get('/cell/{name}', 'CellineController@index');
Route::get('/gene/{name}', 'GeneController@index');
Route::get('/about_us', function() {
	return view("layout", ["menu" => "about", "content" => view('about_us')]);
});


//Route::get('/data', UnController) -> Formulaire ici ?
Route::get('/data', function() {
	return view("layout", ["menu" => "data", "content" => view('data')]);
});

Route::get('/cellection/query', 'QueryController@index');