<?php

/**
 * @file Vanderbiltcontroller.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vanderbilt;

/**
 * @class VanderbiltController
 */
class VanderbiltController extends Controller
{
    public function index(){
		$vanderbilts=Vanderbilt::vanderbilt_table();
		return view("admin.layoutadmin", ["contentadmin" => view('admin.vanderbilt_table', array('vanderbilts'=> $vanderbilts))]);
    }
}