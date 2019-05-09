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
		$genes = Gene::where('hugo', $hugo)->first();
		if($genes == null){
			return view("layout", ["menu"=>"home", "content" => view('error')]);
		}
		$data = Gene::res_data_gene($genes -> idgene);
		$expressionlevels = Gene::get_expressionlevel($genes-> idgene);
		$gene_title = Gene::get_genetitle($genes -> idgene);
		return view("layout", ["menu" => "home", "content" => view('gene', array('genes'=> $genes, 'data'=> $data, 'expressionlevels' => $expressionlevels, 'gene_title' => $gene_title))]);
	}

	public function show(){
		$genes=Gene::gene_table();
		return view("admin.layoutadmin", ["contentadmin" => view('admin.genes_table', array('genes'=> $genes))]);
	}
}
