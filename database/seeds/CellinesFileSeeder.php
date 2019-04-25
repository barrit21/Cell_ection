<?php

/**
 * @file CellinesFile Seeder.php
 */
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Celline;

class CellinesFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * This seed gets informations from the cell_lines.txt file in storage/Data and integrates them in the celline table.
     *
     * @return void
     */
    public function run()
    {
        $file=file('./storage/Data/arrays.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // get file's datas

        unset($file[0]); //delete the first line = columns' name

        foreach($file as $key){
          $celline=Celline::all();
          $infos=explode(',',$key);
          $infos[1]=trim($infos[1],'"');
          $infos[2]=trim($infos[2],'"');
          $infos[3]=trim($infos[3],'"');
          if(Celline::where('name',$infos[3])->exists()){
            $replicate=Celline::where('name','=',$infos[3])->first();
            Celline::where('name','=',$infos[3])->increment('replicate');
          }
          else{
            DB::table('cellines')->insert([
                'name'=>($infos[3]),
                'replicate'=>1,
            ]);
          }
        }
        $file=file('./storage/Data/vanderbilt.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        unset($file[0]);
        foreach($file as $key){
          $infos=explode(',',$key);
          $infos[1]=trim($infos[1],'"');
          $infos[2]=trim($infos[2],'"');
          if(Celline::where('name',$infos[1])->exists()){
            Celline::where('name',$infos[1])->update(['subtype'=>$infos[2]/*,'correlation'=>$infos[3],'pval'=>$infos[4]*/]);
          }
        }
        $file=file('./storage/Data/cit.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        unset($file[0]);
        foreach($file as $key){
          $infos=explode(',',$key);
          $infos[1]=trim($infos[1],'"');
          $infos[2]=trim($infos[2],'"');
          $infos[3]=trim($infos[3],'"');
          $infos[4]=trim($infos[4],'"');
          $infos[5]=trim($infos[5],'"');
          if(Celline::where('name',$infos[1])->exists()){
            Celline::where('name',$infos[1])->update(['citbcmst'=>$infos[2],'citbcmst_mixed'=>$infos[3],'citbcmst_core'=>$infos[4],'citbcmst_confidence'=>$infos[5]]);
          }
        }
    }
}
