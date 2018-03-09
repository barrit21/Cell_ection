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
         *                    
         */
        $content = file('./storage/Data/result.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        $all_cellinedataset = CellineDataset::all();
        $cd_files = $all_cellinedataset->pluck('file')->toArray();

        foreach($content as $line){
            $data = explode(',',$line);
            if($data[0] != "" && $data[1] != "UNS"){
                dd($data);
                $v = new Vanderbilt;
                $v -> classe = $data[1];
                $v -> correlation = round($data[2],2);
                $v -> pval = $data[3];
                $v -> save();
                
                dd($v);
                // if (! in_array($data[0], $cd_files)){
                //     DB::table('celline_dataset')->insert([
                //         'file'=>($data[0]),
                //     ]);
                // }

                $vanderbilt -> celline_datasets() -> save($cellinedataset, 'vanderbilt_id');
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

                $vanderbilt -> celline_datasets() -> save($cellinedataset, 'vanderbilt_id');

               // App\CellineDataset::where('id',$value[0])->update(['vanderbilt_id'=>$vanderbilt]);
            }

        }


            

        #$celline_datasets-> vanderbilts() ->attach($vanderbilts->id,);


    }
}
