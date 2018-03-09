<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Gene;

class UgoToUniprotFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fichier=file('./storage/Data/reactome.entrez2sym.txt',  FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        unset($fichier[0]);

        foreach ($fichier as $key) {
            $key = explode("\t",$key);
            $gene = Gene::firstOrCreate([
                'hugo'=> $key[1],
                'uniprot'=> $key[0],
            ]);
        }
    }
}
