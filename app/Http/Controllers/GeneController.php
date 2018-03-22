<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneController extends Controller
{
    public function index($id) 
	{
		$datum = Gene::findOrFail($id);
		$data = Gene::liste_cell_dataset();
		return view("layout", ["menu" => "home", "content" => view('gene', array('datum'=> $datum, 'data'=> $data))]);
	}
}
