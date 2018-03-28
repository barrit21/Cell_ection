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
			return view("layout", ["menu"=>"home", "content" => view('error')]);
		}
		$data = Celline::liste_cell_datasets($celline -> id);

		$data_classif = Celline::classif($celline -> id);

		//comming soon = need data $data_gsea = Celline::gsea($celline -> id);
		return view("layout", ["menu" => "home", "content" => view('cell', array('datum'=> $celline, 'data'=> $data, 'data_classif'=>$data_classif))]);
	}
}
