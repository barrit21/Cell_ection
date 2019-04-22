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
        $fichier=file('storage/Data/genesets.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        unset($fichier[0]);
        foreach ($fichier as $value) {
        	$value=explode(',',$value);
          $value[1]=trim($value[1],'"');
          $value[2]=trim($value[2],'"');
          if(Geneset::where('name',$value[2])->exists()){
            $genesetid=Geneset::where('name',$value[2])->pluck('idgeneset');
          }
          else{
            $genesetid=0;
          }
          if(Gene::where('hugo',$value[1])->exists()){
            $geneid=Gene::where('hugo',$value[1])->pluck('idgene');
          }
          else{
            $geneid=0;
          }
          DB::table('gene_geneset')->insert([
            'idgene'=>($geneid[0]),
            'idgeneset'=>($genesetid[0]),
          ]);
        	/*$geneset=DB::table('genesets')
        	->where('idgeneset','=',$value[2])
        	->get()
        	->toArray();

        	$gene=DB::table('genes')
        	->where('idgene','=',$value[1])
        	->get()
        	->toArray();*

        	//dd($gene);

        	DB::table('gene_geneset')->insert([
    			'idgene'=>($gene[0]->id),
    			'idgeneset'=>($geneset[0]->id),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
        	]);*/

    	}
    }
}
