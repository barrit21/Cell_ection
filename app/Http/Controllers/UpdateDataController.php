<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Celline;
use App\Vanderbilt;
use App\Citbcmst;
use App\Cellinedataset;
use DB;

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

                //good number of columns
                if ($colums == 12) {
                    //good file format
                    if(filter_var($value[2], FILTER_VALIDATE_INT) === false){
                        
                        return redirect()->back()->with('flash_message_cell_format', "The file is not formatted correctly (wrong format) at line ".$i.".");
                    } else {

                        //Passed all conditions for a good file format
                        $i++;
                        
                        $DBcell=DB::table('cellines')
                        ->where('cellines.name', $value[1])
                        ->select('cellines.name')
                        ->first();

                        //dd($DBcell);

                        if (! $DBcell){                 
                            //dd($DBcell);
                            DB::table('cellines')->insert([
                                'name'=>$value[1], 
                                'replicate'=>$value[2]
                            ]);
                        } else {}
                    }
                } else {
                    return redirect()->back()->with('flash_message_cell', "The file is not formatted correctly (wrong number of colums) at line ".$i.".");
                };
            }
            return redirect()->back()->with('flash_message_success_cell', "The database has been correctly updated.");
        }
    }
}
