<?php

/**
 * @file DatasetController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dataset;

/**
 * @class DatasetController
 */
class DatasetController extends Controller
{
	public function index(){
		$datasets=Dataset::index();
		return view("admin.layoutadmin", ["contentadmin" => view('admin.dataset_table', array('datasets'=> $datasets))]);
	}
}
