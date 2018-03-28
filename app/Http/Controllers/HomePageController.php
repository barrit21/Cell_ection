<?php

/**
 * @file HomePageController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Celline;

/**
 * @class HomePageController
 */
class HomePageController extends Controller
{
	/**
	 * Show the page that contains the search bar
	 *
	 * @return     array  The index view
	 */
	public function index()
	{
		//$data = Celline::liste_cell_dataset();
		return view("layout", ["menu" => "home", "content" => view('index')]);
	}
}