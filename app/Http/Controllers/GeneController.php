<?php

/**
 * @file GeneController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gene;

/**
 * @class GeneController
 */
class GeneController extends Controller
{
	/**
	 * @brief Search the right Hugo name for the gene
	 *
	 * @param      varchar  $hugo   The hugo name
	 *
	 * @return     arrays  The associated view
	 */
    public function index($hugo) 
	{
		$gene = Gene::where('hugo', $hugo)->first();
		if($gene == null){
			return view("layout", ["menu"=>"home", "content" => view('error')]);
		}
		$data = Gene::liste_gene();
		return view("layout", ["menu" => "home", "content" => view('gene', array('datum'=> $gene, 'data'=> $data))]);
	}
}