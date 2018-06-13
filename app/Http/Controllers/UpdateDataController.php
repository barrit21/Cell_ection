<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Celline;
use Vanderbilt;
use Citbcmst;
use Cellinedataset;

class UpdateDataController extends Controller
{
    public function index() {
    	return view("admin.layoutadmin", ["contentadmin" => view('admin.update_data')]);
    }

    public function store(Request $request) {

    	if ($request->hasFile('celline')) {
            
            $this->validate($request, [
                'celline' => 'mimes:txt,csv|max:4000',
            ]);

            $path = $request->celline->path();
            $path = $request->celline->move('upload', 'update.csv');
                
            //Cell file analysis
            $file=file('upload/update.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            $i=1;
            
            foreach ($file as $value) {
                $value=explode(';',$value);
                //dd($value);
                $colums = count($value, COUNT_RECURSIVE);
                //dd($colums);

                if ($colums == 12) {
                    if(filter_var($value[2], FILTER_VALIDATE_INT) === false){
                        
                        return redirect()->back()->with('flash_message_cell_format', "The file is not formatted correctly (wrong format) at line ".$i.".");
                    }
                    else {

                        //Here we passed all the conditions for a good file format for cell files.
                        $i++;
                        echo "OK";
                    }
                }
                else {
                    return redirect()->back()->with('flash_message_cell', "The file is not formatted correctly (wrong number of colums) at line ".$i.".");
                };
            }
        }
    }
}
