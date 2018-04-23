<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Mail\ContactEmail;

class ContactController extends Controller
{
    public function create()
    {
    	return view("layout", ["menu" => "contact", "content" => view('contact_us')]);
    }

    public function store(Request $request)
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
       		//dd($request->all());

    	#we know it was succesfully submitted !! -> basic protection
        	Mail::send('emails.mailcontact',[
                'email'=>$request->email,
                'subject'=>$request->subject,
                'msg'=>$request->message
            ], function($mail) use($request){
                $mail->from($request->email);
                $mail->to('cellection@univ-lyon1.fr')->subject("You've got a new Email from a guest");
            });

	    	return redirect()->back()->with('flash_message', "You're message has been correctly send.");
	    }
        else {
            return view("layout", ["menu" => "data", "content" => view('data')]);
        }
	}
}
