<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Celline;


class HomePageController extends Controller
{
	public function index()
	{
		//$data = Celline::liste_cell_dataset();
		return view("layout", ["menu" => "home", "content" => view('index')]);
	}
}