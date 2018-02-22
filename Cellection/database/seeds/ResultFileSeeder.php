<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ResultFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fichier=file('./storage/Data/result.csv');
        unset($fichier[0]);

        foreach ($fichier as $value) {
        	$value=explode(",", $value);
        	//echo'<pres>',
        	//print_r($value);
        	//echo'</pres>';
        	if (strpos($value[1], "UNS")===false){
	        	DB::table('vanderbilts')->insert([
	                'class'=>($value[1]),
	                'correlation'=>($value[2]),
	                'pval'=>($value[3]),
	                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
	            ]);
	        }

        }
    }
}
