<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{

    public function __construct(){
    	$this->middleware('guest', ['except' => 'destroy']);
    }

    public function create(){
    	return view("layout", ["menu" => "sign", "content'"=>view('sessions.create')]);
    }



    public function store(){
    	//Attempt to authentificate the user.
    	//If not, redirect back ++ send an email to the administrators ?
    	//If so, sign them in

    	if (!auth()->attempt(request(['email', 'password']))) {
    		return back()->withErrors([
    			'message' => 'You are trying to log in as an administrator. A report will be sent to the administrator of this website.'
    		]);
    	}

    	//Redirect to the admin page
    	return redirect('/');
    }
    
    public function destroy(){
    	auth()->logout();
    	return redirect('/');
    }
}
