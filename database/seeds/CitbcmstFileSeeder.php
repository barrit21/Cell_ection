<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Citbcmst;
use App\CellineDataset;

/**
 * Ne pas remplir pour l'instant car les données ne sont pas uniques pour chaque fichier .CEL, à voir avec les données supplémentaires ? 
 */
class CitbcmstFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * /!\ id citbcmst n'est pas unique pour chaque dataset => certaines celline_datasets ont les mêmes résultats de citbcmst
         */
        
        $fichier=file('./storage/Data/20161112 resultats vanderbilt et CIT.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        unset($fichier[0]);
        unset($fichier[1]);

        $citbcmst=Citbcmst::all();
        $cellinedataset=CellineDataset::all();

        foreach ($fichier as $value) {

            $citbcmst=Citbcmst::all();
            $cellinedataset=CellineDataset::all(); 

        	$value=explode(';',$value);
            //print_r($value);
    
            #Insertion des informations dans citbcmsts sans doublons
            if (Citbcmst::where([
                ['class','=',$value[7]],
                ['classmixed','=',$value[8]],
                ['classcore','=',$value[9]]])->exists()){
                echo("no");
            }
            else{
                echo("yes");
                DB::table('citbcmsts')->insert([
                        'class'=>($value[7]),
                        'classmixed'=>($value[8]),
                        'classcore'=>($value[9]),
                    ]);
            #vérification que le fichier soit dans celline_dataset
            if ($cellinedataset->contains('file',$value[2])===false){
                echo($value[2]);
                DB::table('celline_dataset')->insert([
                    'file'=>($value[2]),
                ]);
            }

            $cellinedataset=CellineDataset::where('file',$value[2])->first();
            $citbcmst=Citbcmst::where([
                ['class','=',$value[7]],
                ['classmixed','=',$value[8]],
                ['classcore','=',$value[9]]])->first();


            $citbcmst -> celline_dataset() -> save($cellinedataset, 'citbcmst');



            }

        }
    }
}
