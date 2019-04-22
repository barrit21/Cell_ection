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
    	$token = true/*$request->input('g-recaptcha-response')*/;

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
                $mail->to('shubnighurath@gmail.com')->subject("You've got a new Email from a guest");
            });

            Mail::send('emails.mailconfirm', [
                'email'=>$request->email,
                'subject'=>$request->subject,
                'msg'=>$request->subject
            ], function($mailconfirm) use($request){
                $mailconfirm->from("shubnighurath@gmail.com");
                $mailconfirm->to($request->email)->subject("Cell'ection : mail confirmation");
            });

	    	return redirect()->back()->with('flash_message', "Your message has been correctly sent. You will receive a mail confirmation.");
	    }
        else {
            return view("layout", ["menu" => "data", "content" => view('data')]);
        }
	}
}
