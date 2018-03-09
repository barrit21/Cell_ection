<?php

use Illuminate\Database\Seeder;
use App\Gene;

class GeneFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = file("./storage/Data/genes_symbol.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        unset($content[0]);
        foreach($content as $line){
            $gene_name = str_replace('"','',$line);
            $gene = Gene::firstOrCreate([
                'hugo' => $gene_name,
                'uniprot' => 0
            ]);
        }
    }
}
