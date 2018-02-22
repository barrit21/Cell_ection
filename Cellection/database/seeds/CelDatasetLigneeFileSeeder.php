<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CelDatasetLigneeFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fichier=file('./storage/Data/cel_dataset_lignee.txt');
        unset($fichier[0]);

        foreach ($fichier as $value) {
        	$value=explode("\t",$value);
        	echo'<pres>';
        	print_r($value);
        	echo'</pres>';
        	
        }
        
    }
}
