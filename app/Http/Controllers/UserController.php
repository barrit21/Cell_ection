<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(){
		$users=User::users();
		return view("admin.layoutadmin", ["contentadmin" => view('admin.actual_admins', array('users'=> $users))]);    	
    }

    public function destroy(Request $request)
    {
    	$users = User::find($request['id']);
    	$users->delete();

    	return redirect()->back()->with('flash_message', "You have successfully deleted this administrator.");
    }
}
