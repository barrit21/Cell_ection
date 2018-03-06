<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Celline;
use App\Dataset;
use App\Vanderbilt;
use App\Citbcmst;
use App\CellineDataset;

class Test extends Controller
{
    public function test()
    {
/**
         * hasOne / hasMany (1-1, 1-M)
    -save(new or existing child)
    -saveMany(array of models new or existing)
    -create(array of attributes)
    -createMany(array of arrays of attributes)
    ---------------------------------------------------------------------------

 * belongsTo (M-1, 1-1)
    -associate(existing model)
    ---------------------------------------------------------------------------

 *  belongsToMany (M-M)
    -save(new or existing model, array of pivot data, touch parent = true)
    -saveMany(array of new or existing model, array of arrays with pivot ata)
    -create(attributes, array of pivot data, touch parent = true)
    -createMany(array of arrays of attributes, array of arrays with pivot data)
    -attach(existing model / id, array of pivot data, touch parent = true)
    -sync(array of ids OR ids as keys and array of pivot data as values, detach = true)
    -updateExistingPivot(relatedId, array of pivot data, touch)
    ---------------------------------------------------------------------------

 *  morphTo (polymorphic M-1)
    // the same as belongsTo
    ---------------------------------------------------------------------------

 *  morphOne / morphMany (polymorphic 1-M)
    // the same as hasOne / hasMany
    ---------------------------------------------------------------------------

 *  morphedToMany /morphedByMany (polymorphic M-M)
    // the same as belongsToMany

*/
    	
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

        $fichier=file('cel_dataset_lignee.txt');
        unset($fichier[0]);

        
        foreach ($fichier as $value) {
            $value=explode("\t",$value);
            $value[2]=trim($value[2]);

            $compteur=$compteur+1;



            $dataset= Dataset::firstOrNew(['name'=>$value[0]]);
            //$datasets= save();
            */

            /**
            if ($datasets->contains('name', $value[0])===false){
                echo('hola1');
                DB::table('datasets')->insert([
                    'name'=>($value[0]),
                    'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }
            */
           /**

            $celline= Celline::firstOrNew(['name'=>$value[2]]);
            //$cellines=save();
            /**
            if ($cellines->contains('name',$value[2])===false){
                echo ('hola2');
                DB::table('cellines')->insert([
                    'name'=>($value[2]),
                    'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }
            */

            /**
            //$dataset=Dataset::where('name',$value[0])->get();
            //$celline=Celline::where('name',$value[2])->get();
            $filename=$value[1];

           
            $dataset -> cellines() -> attach($celline -> id, [
                'file' => $filename]);
            
            //$cellines -> datasets() -> attach($dataset-> id, [
              //  'file'=> $filename]);
              //  
        }*/

        $celline=Celline::first();
        $dataset=Dataset::first();


        $vanderbilt=Vanderbilt::where([
                ['class','BL2'],
                ['correlation','0.233792'],
                ['pval','0.005'],
                ])->first();
        #dd($vanderbilt);

        $cellinedataset=CellineDataset::where('file','BT.20_SS331465_HG.U133_Plus_2_HCHP.182965_.CEL')->first();
        dd($cellinedataset);

        $vanderbilt -> celline_datasets() ->save($cellinedataset, 'vanderbilt_id');
    }

}
