<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
    	return view("layout", ["menu" => "about", "content" => view('about_us')]);
    }

    public function send(Request $request)
    {
    	//Validate the form
    	$this->validate(request(), [
    		'email' => 'required|email',
    		'subject'=>'required',
    		'message'=>'required'

    	]);
    	//Validate that you're not a robot
    	$token = $request->input('g-recaptcha-response');

    	//Send an email
        if ($token) {
    	
    	#we know it was succesfully submitted !! -> basic protection
	    return redirect('/');
	    }
	}
}
