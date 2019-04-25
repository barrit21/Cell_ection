<?php

/**
 * @file GenesSeederFileSeeder.php
 */

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Gene;

/**
 * @class GenesSeeder
 */
class GenesFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fichier=file('./storage/Data/entrez.csv');
        unset($fichier[0]);
        foreach ($fichier as $key) {
            $genetable=Gene::all();
            $key=explode(",",$key);
            $key[1]=trim($key[1],'"');
            $key[2]=trim($key[2],'"');
            $key[2]=(int)$key[2];
            if($genetable->contains('hugo',$key[1])===false){
                DB::table('genes')->insert([
                    'hugo'=>($key[1]),
                    'entrez'=>($key[2]),
                ]);
            }

            else{
                $hugo=Gene::where('hugo',$key[1])->update(['entrez' => $key[2]]);
                print('problem');
            }
        }
    }
}
