<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * CREATE SEEDER FOR POPULATE TABLE : php artisan make:seeder DatasetsTableSeeder / on console /
 * LET POPULATE : php artisan db:seed --class=DatasetsTableSeeder / on console /
 */

class DatasetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //-----------------------------------------------------
    //      PARSING 
    //-----------------------------------------------------
      // Raw data as an array 
        //require('/Users/leliadebornes/Desktop/M1BIOINFO/projet_printemps/Laravel_cellection/projet_printemps/resources/BD/datasets.txt');
    	$fichier=file('./resources/BD/datasets.txt');

        #Delete 1st and second line of the array
    	unset($fichier[1]);
    	unset($fichier[0]);

      //-----------------------------------------------------
      //      POPULATE 
      //-----------------------------------------------------

    	foreach ($fichier as $line) {
    		DB::table('datasets')->insert([
                'name_datasets'=>($line),
            ]);
    	}

    }
}
