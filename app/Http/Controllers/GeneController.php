<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gene;

class GeneController extends Controller
{
    public function index($id) 
	{
		$datum = Gene::findOrFail($id);
		$data = Gene::liste_gene();
		return view("layout", ["menu" => "home", "content" => view('gene', array('datum'=> $datum, 'data'=> $data))]);
	}
}
