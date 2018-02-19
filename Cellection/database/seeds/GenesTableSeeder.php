<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * CREATE SEEDER FOR POPULATE TABLE : php artisan make:seeder GenesTableSeeder / on console /
 * LET POPULATE : php artisan db:seed --class=GenesTableSeeder / on console /
 */

class GenesTableSeeder extends Seeder
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
    	$fichier=file('./resources/BD/genes_symbol.txt');
    	
        #Delete 1st and second line of the array      
        unset($fichier[0]);
    	unset($fichier[1]);


    //-----------------------------------------------------
    //      POPULATE 
    //-----------------------------------------------------
    	foreach ($fichier as $line) {
    		DB::table('genes')->insert([
                'name_genes'=>($line),
            ]);
    	}

    }
}
