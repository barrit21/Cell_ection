<?php

/**
 * @file GenesetController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Geneset;

/**
 * @class GenesetController
 */
class GenesetController extends Controller
{
    public function index(){
		$genesets=Geneset::geneset_table();
		return view("admin.layoutadmin", ["contentadmin" => view('admin.geneset_table', array('genesets'=> $genesets))]);    	
    }
}