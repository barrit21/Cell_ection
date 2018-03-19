<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GseaResultFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {//à refaire avec les clés étrangère sinon code là OK
        $fichier=file('./storage/Data/gsearesults_example_with_reactome.txt');
        unset($fichier[0]);
        foreach ($fichier as $value) {
        	$value=explode("\t", $value);
        	//echo'<pres>';
        	//print_r($value);
        	//echo'</pres>'; 
        	DB::table('enrichementscores')->insert([
            	'pval'=>($value[1]),
            	'padj'=>($value[2]),
            	'es'=>($value[3]),
            	'nes'=>($value[4]),
            	'moreextreme'=>($value[5]),
            	#'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),

            ]);
        }
    }
}
