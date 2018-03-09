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
        $fichier=file('./storage/Data/citbcmst.bertheau07.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        unset($fichier[0]);
        $all_cellinedataset = CellineDataset::all();

        foreach ($fichier as $value) {
        	$value = str_replace('"', '', $value);
        	$value = explode("\t",$value);
            Citbcmst::firstOrCreate([
                'classe' => $value[1],
                'classmixed' => $value[2],
                'classcore' => $value[3],
                'classification' => $value[4]
            ]);

            /*
             * Pour quelle lignée, quel dataset ?
             */

            // if ($cellinedataset->contains('file',$value[1])===false){
            //     DB::table('celline_dataset')->insert([
            //         'file'=>($value[1]),
            //     ]);
            // }

            // $cellinedataset=CellineDataset::where('file',$value[1])->first();
            // $citbcmst=Citbcmst::where()
        }
    }
}
