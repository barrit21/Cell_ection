<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Gene;
use App\Geneset;

class GeneGenesetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    { 	
        $fichier=file('storage/Data/gene_geneset.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($fichier as $value) {
        	$value=explode(',',$value);

        	$geneset=DB::table('genesets')
        	->where('name','=',$value[0])
        	->get()
        	->toArray();

        	$gene=DB::table('genes')
        	->where('entrez','=',$value[1])
        	->get()
        	->toArray();

        	//dd($gene);
        	
        	DB::table('gene_geneset')->insert([
    			'gene_id'=>($gene[0]->id),
    			'geneset_id'=>($geneset[0]->id),
                'created_at'=>Carbon::now(),
                'updated_at' => Carbon::now(),
        	]);

    	}
    }
}
