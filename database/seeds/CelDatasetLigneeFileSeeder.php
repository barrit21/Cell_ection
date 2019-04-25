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
        $fichier=file('./storage/Data/arrays.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); //get the file datas
        unset($fichier[0]); //deletion of the first line (columns' name)
        $celline=Celline::all();
        $dataset=Dataset::all();
        foreach ($fichier as $value) {
            $value=explode(",",$value);
            $value[1]=trim($value[1],'"');
            $value[2]=trim($value[2],'"');
            $value[3]=trim($value[3],'"');
            /*if ($dataset->contains('name', $value[1])===false){ //verification that the dataset is already in 'dataset'
                DB::table('datasets')->insert([
                    'name'=>($value[1]),
                ]);
            }
            if ($celline->contains('name',$value[3])===false){ //verification that the celline is already in 'cellines'
                DB::table('cellines')->insert([
                    'name'=>($value[3]),
                    'replicate'=>(1),
                ]);
            }
            */
            //data integration in 'celline_dataset'
            $dataset=Dataset::where('name',$value[1])->pluck('iddataset')/*->select('id')->find(1)*/;
            $celline=Celline::where('name',$value[3])->pluck('idcelline')/*->select('id')->find(1)*/;
            DB::table('celline_dataset')->insert([
              'file'=>($value[2]),
              'idcelline'=>($celline[0]),
              'iddataset'=>($dataset[0]),
            ]);
            /*$filename=str_replace('-','.',$value[1]);

            $dataset -> cellines() -> attach(['id' => id,
               'file' => $filename]);*/
        }
        $file=file('./storage/Data/vanderbilt.by.array.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        unset($file[0]);
        foreach($file as $key){
          $infos=explode(',',$key);
          $infos[1]=trim($infos[1],'"');
          if($infos[3]==='NA'){
            $infos[3]=-1;
            $infos[4]=-1;
          }
          if(DB::table('celline_dataset')->where('file',$infos[1])->exists()){
          DB::table('celline_dataset')->where('file',$infos[1])->update(['subtype'=>$infos[2],'correlation'=>$infos[3],'pval'=>$infos[4]]);
          }
        }
        $file=file('./storage/Data/cit.by.array.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        unset($file[0]);
        foreach($file as $key){
          $infos=explode(',',$key);
          $infos[1]=trim($infos[1],'"');
          if(DB::table('celline_dataset')->where('file',$infos[1])->exists()){
            DB::table('celline_dataset')->where('file',$infos[1])->update(['citbcmst'=>$infos[2],'citbcmst_mixed'=>$infos[3],'citbcmst_core'=>$infos[4],'citbcmst_confidence'=>$infos[5]]);
          }
        }
    }
}
