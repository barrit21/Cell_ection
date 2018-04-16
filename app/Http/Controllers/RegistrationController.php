<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function create(){
    	return view("layout", ["menu" => "home", "content'"=>view('registrations.create')]);	
    }

    public function store(){
    	//Validate the form

    	$this->validate(request(), [
    		'name' => 'required',
    		'email' => 'required|email',
    		'password'=>'required|confirmed'

    	]);

    	//Create and save the user

    	$user = User::create(request(['name', 'email', 'password']));

    	//Sign them in

    	auth()->login($user);


    	//Redirect to a special page

    	return redirect()->home();

    }
}
