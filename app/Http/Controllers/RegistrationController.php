<?php

namespace App\Http\Controllers;
use App\User;
use App\Mail\Welcome;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function create(){
    	return view("layout", ["menu" => "home", "content'"=>view('registrations.create')]);	
    }

    public function store(Request $request){
    	//Validate the form
    	$this->validate(request(), [
    		'name' => 'required',
    		'email' => 'required|email',
    		'password'=>'required|confirmed'

    	]);

        //Validate that you're not a robot
        $token = $request->input('g-recaptcha-response');
        //dd($token);

        if ($token) {
            #we know it was succesfully submitted !! -> basic protection
            
            //Create and save the user + Encryption
            $user = User::create([
                'name' => request('name'),
                'email' => request('email'),
                'password' => bcrypt(request('password'))
            ]);

            auth()->login($user);

            \Mail::to($user)->send(new Welcome($user));


            //Redirect to a special page

            return redirect()->home();
        }
        else {
            return redirect('/');
        }



    	

    }

}
