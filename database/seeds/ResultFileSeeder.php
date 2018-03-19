<?php

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Vanderbilt;
use App\CellineDataset;

class ResultFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$vanderbilts=Vanderbilt::all();
        //$celline_datasets=CellineDataset::all();

        /** 
         * Vanderbilt table population 
         *                    */
        $fichier=file('./storage/Data/result.csv');
        unset($fichier[0]);

        foreach ($fichier as $value) {
        	$value=explode(",", $value);
            $value[3]=trim($value[3]);
        	//dd($value[0]);
        	if (strpos($value[1], "UNS")===false){
	        	DB::table('vanderbilts')->insert([
	                'class'=>($value[1]),
	                'correlation'=>($value[2]),
	                'pval'=>($value[3]),
	                #'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
	            ]);

	        }
        }

        foreach ($fichier as $value) {
            $value=explode(",", $value);
            $value[3]=trim($value[3]);
            $value[2]=round($value[2],6);
            if (strpos($value[1], "UNS")===false){
                //dd($value);
                $vanderbilt=Vanderbilt::where([
                ['class',$value[1]],
                ['correlation',($value[2])],
                ['pval',$value[3]],
                ])->first();
                #dd($vanderbilt);
                
                $cellinedataset=CellineDataset::all();
                
                if ($cellinedataset->contains('file',$value[0])===false){
                    DB::table('celline_dataset')->insert([
                        'file'=>($value[0]),
                    ]);
                }
                
            
                $cellinedataset=CellineDataset::where(
                    'file', $value[0])->first();

                $vanderbilt -> celline_dataset() -> save($cellinedataset, 'vanderbilt_id');

               // App\CellineDataset::where('id',$value[0])->update(['vanderbilt_id'=>$vanderbilt]);
            }

        }


            

        #$celline_datasets-> vanderbilts() ->attach($vanderbilts->id,);


    }
}
