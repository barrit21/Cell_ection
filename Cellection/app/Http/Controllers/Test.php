<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Celline;
use \App\Dataset;
use \App\Vanderbilt;
use \App\Citbcmst;

class Test extends Controller
{
    public function test()
    {
    	
    	/**
        //$dataset = Dataset::where('name','Krupp13')->first();
    	$celline = Celline::where('name','BT20')->first();
    	$filename = "BT-20_SS331465_HG-U133_Plus_2_HCHP-182965_.CEL";
    	
    	// dd($celline);
    	$dataset -> cellines() -> attach($celline -> id, [
    		"file" => $filename
        ]);
    	 dd($dataset);
    	//dd($celline-> datasets);
        */
       
       /**
        $cellines = Celline::all();
        $datasets = Dataset::all();

        $fichier=file('./public/cel_dataset_lignee.txt');
        unset($fichier[0]);

        foreach ($fichier as $value) {
            $value=explode("\t",$value);

            $datasets= Dataset::firstOrNew(['name'=>$value[0]]);
            //$datasets= save();

            $cellines= Celline::firstOrNew(['name'=>$value[2]]);
            //$cellines=save();

    
            $dataset=Dataset::where('name',$value[0])->get();
            $celline=Celline::where('name',$value[2])->get();
            $filename=$value[1];

           
            $dataset -> cellines() -> attach($celline -> id, [
            "file" => $filename]);
        */
        }
    }
}
