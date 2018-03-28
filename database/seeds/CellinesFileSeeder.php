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
        $fichier=file('./storage/Data/cell_lines.txt',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); // get file's datas

        unset($fichier[0]); //delete the first line = columns' name

        foreach($fichier as $key){
            $infos=explode("\t", $key);
            $infos[0]=str_replace('"','',$infos[0]);
            $infos[2]=trim($infos[2]);
            DB::table('cellines')->insert([
                'name'=>($infos[0]),
                'replicate'=>intval($infos[2]),
            ]);
        }
    }
}