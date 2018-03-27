<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Celline;

class CellineController extends Controller
{
	public function index($name) 
	{
		$celline = Celline::where('name',$name)->first();
		if($celline == null){
			// ERREUR
		}
		$data = Celline::res_data($celline -> id);
		return view("layout", ["menu" => "home", "content" => view('cell', array('datum'=> $celline, 'data'=> $data))]);
	}
}
