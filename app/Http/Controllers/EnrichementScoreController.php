<?php

/**
 * @file EnrichementScoreController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enrichementscore;

/**
 * @class EnrichementScoreController
 */
class EnrichementScoreController extends Controller
{
	public function index(){
		$enriscores=Enrichementscore::enrichementscore_table();
		return view("admin.layoutadmin", ["contentadmin" => view('admin.enrichementscore_table', array('enriscores'=> $enriscores))]);		
	}
}