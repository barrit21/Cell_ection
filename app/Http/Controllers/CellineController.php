<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Celline;

class CellineController extends Controller
{
	public function index($id) 
	{
		$datum = Celline::findOrFail($id);
		$data = Celline::liste_cell_dataset();
		return view("layout", ["menu" => "home", "content" => view('cell', array('datum'=> $datum, 'data'=> $data))]);
	}
}
