<?php

/**
 * @file CitbcmstFileSeeder.php
 */

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Citbcmst;
use App\CellineDataset;

/**
 * @class CitbcmstFileSeeder
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

        $fichier=file('./storage/Data/cit.by.array.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        unset($fichier[0]);

        $citbcmst=Citbcmst::all();
        $cellinedataset=CellineDataset::all();

        foreach ($fichier as $value) {

            $value=explode(',',$value);

            $cellinedataset=CellineDataset::all();

            if (Citbcmst::where([ //insert informations in citbcmsts without duplicates
                ['class','=',$value[1]],
                ['classmixed','=',$value[2]],
                ['classcore','=',$value[3]]])->exists()){
            }

            else{
                DB::table('citbcmsts')->insert([
                        'class'=>($value[1]),
                        'classmixed'=>($value[2]),
                        'classcore'=>($value[3]),
                        'classification'=>($value[4]),
                        'created_at' => Carbon::now(),//not useful
                        'updated_at' => Carbon::now(),
                    ]);
            }

            if ($cellinedataset->contains('file',$value[2])===false){ //verifies that the file is in celline_dataset
                DB::table('celline_dataset')->insert([
                    'file'=>($value[2]),
                ]);
            }

            $citbcmst=Citbcmst::where([ //integrate the citbcmst ID in the celline_dataset table
                ['class','=',$value[1]],
                ['classmixed','=',$value[2]],
                ['classcore','=',$value[3]]])->pluck('id');

            CellineDataset::where('file',$value[1])->update(['citbcmst_id'=>$citbcmst[0]]);
        }
    }
}
