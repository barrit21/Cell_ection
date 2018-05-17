<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Cellines;
use App\Geneset;

class EnrichmentScoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fichier=file('storage/Data/GSEA.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($fichier as $value) {
        	$value=explode(',',$value);
        	//dd($value);

        	$cell=DB::table('cellines')
        	->where('name','=',$value[1])
        	->get()
        	->toArray();

        	$geneset=DB::table('genesets')
        	->where('name','=',$value[0])
        	->get()
        	->toArray();
        	
        	DB::table('enrichementscores')->insert([
    			'geneset_id'=>($geneset[0]->id),
    			'celline_id'=>($cell[0]->id),
    			'link'=>($value[2]),
    			'size'=>($value[3]),
    			'ES'=>($value[4]),
    			'NES'=>($value[5]),
    			'NOMpval'=>($value[6]),
    			'FDRqval'=>($value[7]),
    			'FWERqval'=>($value[8]),
    			'rank_at_max'=>($value[9]),
    			'tags'=>($value[10]),
    			'list'=>($value[11]),
    			'signal'=>($value[12]),
    			'created_at'=>Carbon::now(),
    			'updated_at'=>Carbon::now(),

        	]);

    	}
    }
}
