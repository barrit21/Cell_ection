<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateDataController extends Controller
{
    public function index() {
    	return view("admin.layoutadmin", ["contentadmin" => view('admin.update_data')]);
    }

    public function store(Request $request) {
    	if ($request->hasFile('fichier')) {
    		$path = $request->fichier->path();
    		$path = $request->fichier->move('upload', 'update.csv');
 	   		
 	   		//Analyse du fichier
 	   		$fichier=file('upload/update.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		}
    	
    	return view("admin.layoutadmin", ["contentadmin" => view('admin.update_data', array('file'=> $file))]);
    }
}
