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
          $value[1]=trim($value[1],'"');
          $value[2]=trim($value[2],'"');
          $value[3]=trim($value[3],'"');
          $value[4]=trim($value[4],'"');
          $value[5]=trim($value[5],'"');
          $value[6]=trim($value[6],'"');
          $value[7]=trim($value[7],'"');
          $value[8]=trim($value[8],'"');
          $value[9]=trim($value[9],'"');
          $value[10]=trim($value[10],'"');
          $value[11]=trim($value[11],'"');
          $value[12]=trim($value[12],'"');

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
