<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
    	return view("layout", ["menu" => "about", "content" => view('about_us')]);
    }
}
