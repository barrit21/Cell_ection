<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DatasetsFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fichier=file('./storage/Data/datasets.txt');

    	unset($fichier[1]);
    	unset($fichier[0]);

        foreach ($fichier as $line) {
        	$line=str_replace('"', '', $line);
        	$line=trim($line);
    		DB::table('datasets')->insert([
                'name'=>($line),
                #'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ]);
    	}
    }
}
