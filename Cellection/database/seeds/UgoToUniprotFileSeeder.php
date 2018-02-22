<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UgoToUniprotFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fichier=file('./storage/Data/reactome.entrez2sym.txt');
        unset($fichier[0]);

        foreach ($fichier as $key) {
        	$key=explode("\t",$key);
        	DB::table('genes')->insert([
                'hugo'=>($key[1]),
                'uniprot'=>($key[0]),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),

         	]);

        }
    }
}
