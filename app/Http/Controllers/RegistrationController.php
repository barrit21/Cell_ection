<?php

namespace App\Http\Controllers;
use App\User;
use App\Mail\Welcome;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(){
    	return view("admin.layoutadmin", ["contentadmin"=>view('registrations.create')]);	
    }

    public function store(Request $request){
    	//Validate the form
    	$this->validate(request(), [
    		'name' => 'required',
    		'email' => 'required|email',
    		'password'=>'required|confirmed'
    	]);
            
        //Create and save the user + Encryption
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);

        \Mail::to($user)->send(new Welcome($user));


        //Redirect to a special page
        return redirect()->back()->with('flash_message', "You have correctly register a new administrator.");
    }

}
