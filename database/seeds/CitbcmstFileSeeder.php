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
        $fichier=file('./storage/Data/citbcmst.bertheau07.csv');
        unset($fichier[0]);

        foreach ($fichier as $value) {
        	//$value=str_replace('"', '', $value);
        	$value=explode('"',$value);
        	
            DB::table('citbcmsts')->insert([
                'class'=>($value[3]),
                'classmixed'=>($value[5]),
                'classcore'=>($value[7]),
                #'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }

        foreach ($fichier as $value) {
            $value=explode('"',$value);
            
            $cellinedataset=CellineDataset::all();
            if ($cellinedataset->contains('file',$value[1])===false){
                DB::table('celline_dataset')->insert([
                    'file'=>($value[1]),
                ]);
            }

            $cellinedataset=CellineDataset::where('file',$value[1])->first();
            $citbcmst=Citbcmst::where([
                ['class',$value[3]],
                ['classmixed',$value[5]],
                ['classcore',$value[7]],
            ])->get();
            dd($citbcmst);

            #$citbcmst-> celline_dataset() -> save($cellinedataset, 'citbcmst_id');
        }
    }
}
