<?php

/**
 * @file CellinesFile Seeder.php
 */
use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
        $file=file('./storage/Data/cellines.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // get file's datas

        unset($file[0]); //delete the first line = columns' name

        foreach($file as $key){
            $infos=explode(',', $key);
            DB::table('cellines')->insert([
                'name'=>($infos[1]),
                'replicate'=>intval($infos[2]),
            ]);
        }
    }
}