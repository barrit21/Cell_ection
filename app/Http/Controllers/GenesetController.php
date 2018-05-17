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
    public function index($name)
	{
		$geneset = Geneset::where('name',$name)->first();
		if($geneset == null){
			return view("layout", ["menu"=>"home", "content" => view('error')]);
		}
		
		$genes = Geneset::get_genes($geneset -> id);
		//$gene_titles=Geneset::get_genetitle($geneset -> id);

		//$data_classif = Celline::classif($geneset -> id);

		//comming soon = need data $data_gsea = Celline::gsea($geneset -> id);
		return view("layout", ["menu" => "home", "content" => view('geneset', array('datum'=> $geneset, 'genes'=> $genes))]);
	}

    public function show(){
		$genesets=Geneset::geneset_table();
		return view("admin.layoutadmin", ["contentadmin" => view('admin.geneset_table', array('genesets'=> $genesets))]);    	
    }
}