<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class SessionsController extends Controller
{

    public function __construct(){
    	$this->middleware('guest', ['except' => 'destroy']);
    }

    public function create(){
    	return view("sessions.layoutsessions", ["sessionscontent'"=>view('sessions.create')]);
    }

    public function store(Request $request){
    	//Attempt to authentificate the user.
    	//If not, redirect back ++ send an email to the administrators ?
    	//If so, sign them in
        
        $this->validate(request(), [
            'email' => 'required|email',
            'password'=>'required'

        ]);

    	if (!auth()->attempt(request(['email', 'password']))) 
        {
    		return back()->withErrors([
    			'message' => "You are trying to log in as an administrator. Please do not try if you're not an administrator."
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
