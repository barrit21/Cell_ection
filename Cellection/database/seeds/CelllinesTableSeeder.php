<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * CREATE SEEDER FOR POPULATE TABLE : php artisan make:seeder CelllinesTableSeeder / on console /
 * LET POPULATE : php artisan db:seed --class=CelllinesTableSeeder / on console /
 */

#A TESTER POUR LE CHEMIN RELATIF=
//<?php
//print_r($_SERVER);


class CelllinesTableSeeder extends Seeder
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
    	//require('database/seeds/cell_lines.txt');
    	$fichier=file('./resources/BD/cell_lines.txt');

      #Delete 1st and second line of the array
      unset($fichier[1]);
      unset($fichier[0]);
    	

      //-----------------------------------------------------
      //      POPULATE 
      //-----------------------------------------------------

    	foreach($fichier as $key){
            $infos=explode("\t", $key);
            
            DB::table('celllines')->insert([
                'name_celllines'=>($infos[0]),
                'replicatenumber'=>intval($infos[2]),
            ]);
        }
    
    }
}


