<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Citbcmst;
use App\CellineDataset;


class CitbcmstFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $fichier=file('./storage/Data/20161112 resultats vanderbilt et CIT.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        unset($fichier[0]);
        unset($fichier[1]);

        $citbcmst=Citbcmst::all();
        $cellinedataset=CellineDataset::all();

        foreach ($fichier as $value) {

        	$value=explode(';',$value);
            
            $cellinedataset=CellineDataset::all();
    
            #Insertion des informations dans citbcmsts sans doublons
            if (Citbcmst::where([
                ['class','=',$value[7]],
                ['classmixed','=',$value[8]],
                ['classcore','=',$value[9]]])->exists()){
            }
            else{
                DB::table('citbcmsts')->insert([
                        'class'=>($value[7]),
                        'classmixed'=>($value[8]),
                        'classcore'=>($value[9]),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),

                    ]);
            }
            #vérification que le fichier soit dans celline_dataset
            if ($cellinedataset->contains('file',$value[2])===false){
                //echo($value[2]);
                DB::table('celline_dataset')->insert([
                    'file'=>($value[2]),
                ]);
            }


            #intégration de l'id citbcmst dans la table celline dataset
            $citbcmst=Citbcmst::where([
                ['class','=',$value[7]],
                ['classmixed','=',$value[8]],
                ['classcore','=',$value[9]]])-> first();
            $c=$citbcmst->id;


            CellineDataset::where('file',$value[2])->update(['citbcmst_id'=>$c]);

        }

    }
}
