<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * CREATE SEEDER FOR POPULATE TABLE : php artisan make:seeder GenesetTableSeeder / on console /
 * LET POPULATE : php artisan db:seed --class=GenesetTableSeeder / on console /
 */

class GenesetTableSeeder extends Seeder
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
    
    	$fichier=file('./resources/BD/geneset_example_with_reactome.txt');


    //-----------------------------------------------------
    //      POPULATE 
    //-----------------------------------------------------
    	foreach ($fichier as $key => $value) {
    		if(strpos($value, "$")===0){
    			DB::table('geneset')->insert([
    				'name_geneset'=>($value),
    			]);
    		}
    	}

    }
}
