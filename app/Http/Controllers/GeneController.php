<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gene;

class GeneController extends Controller
{
    public function index($hugo) 
	{
		$gene = Gene::where('hugo', $hugo)->first();
		if($gene == null){
			return view("layout", ["menu"=>"home", "content" => view('error')]);
		}
		$data = Gene::res_data_gene($gene -> id);
		return view("layout", ["menu" => "home", "content" => view('gene', array('datum'=> $gene, 'data'=> $data))]);
	}
}