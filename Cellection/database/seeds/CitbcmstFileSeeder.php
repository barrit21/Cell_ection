<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CitbcmstFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fichier=file('./storage/Data/citbcmst.bertheau07.csv');
        unset($fichier[0]);

        foreach ($fichier as $value) {
        	//$value=str_replace('"', '', $value);
        	$value=explode('"',$value);
        	
        	DB::table('citbcmsts')->insert([
                'class'=>($value[3]),
                'classmixed'=>($value[5]),
                'classcore'=>($value[7]),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
