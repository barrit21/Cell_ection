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

Route::get('/', "HomeController@index" );
//Route::get('/cellline_dataset', 'Frontend\CelllineDatasetController@index');
//Route::get('/cellline_dataset/create', 'Frontend\CelllineDatasetController@create');
//Route::get('/cellline_dataset/last/', 'Frontend\CelllineDatasetController@last');
//Route::get('/cellline_dataset/first/', 'Frontend\CelllineDatasetController@first');
//Route::get('/cellline_dataset/find/{categorieId}', 'Frontend\CelllineDatasetController@find');
//Route::get('/cellline_dataset/{cellline_datasetId}', function ($cellline_datasetId) {
// return \App\CelllineDataset::find($cellline_datasetId);});
