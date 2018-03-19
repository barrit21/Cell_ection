<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CellinesFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fichier=file('./storage/Data/cell_lines.txt');

        unset($fichier[0]);
        unset($fichier[1]);

        foreach($fichier as $key){
            $infos=explode("\t", $key);
            $infos[0]=str_replace('"','',$infos[0]);
            $infos[2]=trim($infos[2]);
            DB::table('cellines')->insert([
                'name'=>($infos[0]),
                'replicate'=>intval($infos[2]),
                #'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
