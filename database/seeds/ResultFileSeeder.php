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

        /** 
         * Vanderbilt population 
         *                    */
       $fichier=file('./storage/Data/20161112 resultats vanderbilt et CIT.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        unset($fichier[0]);
        unset($fichier[1]);


        #insertion des données dans la table vanderbilts sans doublons (sauf pour les "UNS")
        foreach ($fichier as $value) {
        	$value=explode(';',$value);
        	if (strpos($value[4], "UNS")===false){

                if (Vanderbilt::where([
                    ['class','=',$value[4]],
                    ['correlation','=',$value[5]],
                    ['pval','=',$value[6]]])->exists()){
                }
                else{
                    DB::table('vanderbilts')->insert([
                        'class'=>($value[4]),
                        'correlation'=>($value[5]),
                        'pval'=>($value[6]),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),

                    ]);
                }

                $vanderbilt=Vanderbilt::where([
                ['class',$value[4]],
                ['correlation',($value[5])],
                ['pval',$value[6]],
                ])->first();
                
                $cellinedataset=CellineDataset::all();

                #vérification que file de vanderbilt existe dans la table celline_dataset
                if ($cellinedataset->contains('file',$value[2])===false){
                        DB::table('celline_dataset')->insert([
                        'file'=>($value[2]),
                    ]);
                }
                
            
                $cellinedataset=CellineDataset::where(
                    'file', $value[2])->first();

                $vanderbilt -> celline_dataset() -> save($cellinedataset, 'vanderbilt_id');

	        }
        }

    }
}
