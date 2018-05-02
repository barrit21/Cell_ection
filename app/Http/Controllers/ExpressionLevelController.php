<?php

/**
 * @file ExpressionLevelController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ExpressionLevel;

/**
 * @class ExpressionLevelController
 */
class ExpressionLevelController extends Controller
{
	public function index(){
		$explevels=ExpressionLevel::expressionlevel_table();
		return view("admin.layoutadmin", ["contentadmin" => view('admin.expressionlevel_table', array('explevels'=> $explevels))]);		
	}
}