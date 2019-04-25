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

		$genes = Geneset::get_genes($geneset -> idgeneset);
		$ES = Geneset::getES($geneset -> idgeneset);

		return view("layout", ["menu" => "home", "content" => view('geneset', array('datum'=> $geneset, 'genes'=> $genes, 'ES' => $ES))]);
	}

    public function show(){
		$genesets=Geneset::geneset_table();
		return view("admin.layoutadmin", ["contentadmin" => view('admin.geneset_table', array('genesets'=> $genesets))]);
    }
}
