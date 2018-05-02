<?php

/**
 * @file CitbcmstController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Citbcmst;

/**
 * @class CitbcmstController
 */
class CitbcmstController extends Controller
{
    public function index(){
		$citbcmsts=Citbcmst::citbcmst_table();
		return view("admin.layoutadmin", ["contentadmin" => view('admin.citbcmst_table', array('citbcmsts'=> $citbcmsts))]);    	
    }
}