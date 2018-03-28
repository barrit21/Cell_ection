<?php

/**
 * @file CelDatasetLigneeFileSeeder.php
 */

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use App\Celline;
use App\Dataset;
use App\Vanderbilt;
use App\Citbcmst;

/**
 * @class CelDatasetLigneeFileSeeder
 */
class CelDatasetLigneeFileSeeder extends Seeder
{
    /**
     * @brief Run the database seeds.
     * 
     * This seed gets informations from the cel_dataset_lignee.txt file in storage/Data/ and use them to fill the celline_dataset table.
     * It also verifies that the informations from that file are already present in the cellines and datasets table are already populated
     *
     * @return void
     */
    public function run()
    {   
        $fichier=file('./storage/Data/cel_dataset_lignee.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); //get the file datas
        unset($fichier[0]); //deletion of the first line (columns' name)
        foreach ($fichier as $value) {
            $value=explode("\t",$value);
            $value[2]=trim($value[2]);            
            $dataset=Dataset::all();
            if ($dataset->contains('name', $value[0])===false){ //verification that the dataset is already in 'dataset'
                DB::table('datasets')->insert([
                    'name'=>($value[0]),
                ]);
            }
            
            $celline=Celline::all();
            if ($celline->contains('name',$value[2])===false){ //verification that the celline is already in 'cellines'
                DB::table('cellines')->insert([
                    'name'=>($value[2]),
                ]);
            }

            //data integration in 'celline_dataset'
            $dataset=Dataset::where('name',$value[0])->first();
            $celline=Celline::where('name',$value[2])->first();
            $filename=str_replace('-','.',$value[1]);
            
            $dataset -> cellines() -> attach($celline -> id, [
               'file' => $filename]);  
        } 
    }
}