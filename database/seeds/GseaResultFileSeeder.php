<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Celline;
use App\Geneset;
use App\CellineDataset;
use App\EnrichementScore;

class GseaResultFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {//à refaire avec les clés étrangère sinon code là OK
        $fichier=file('./storage/Data/gsearesults_example_with_reactome.txt',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        unset($fichier[0]);

        $geneset_table=Geneset::all();


        foreach ($fichier as $value) {
        	$value=explode("\t", $value);

        	$enrich=DB::table('enrichementscores')->insert([
            	'pval'=>($value[1]),
            	'padj'=>($value[2]),
            	'es'=>($value[3]),
            	'nes'=>($value[4]),
            	'moreextreme'=>($value[5]),
            ]);

            if ($geneset_table->contains('name',$value[0])===false){
                echo('hola');
                DB::table('genesets')->insert([
                    'name'=>$value[0],
                ]);
            }

            
            $enrichementscore=EnrichementScore::where([
                ['pval',$value[1]],
                ['padj',$value[2]],
                ['es',$value[3]],
                ['nes', $value[4]],
                ['moreextreme', $value[5]]
            ])-> pluck('id');


            $geneset=Geneset::where('name',$value[0])-> pluck('id')-> first() ;
            $geneset= str_replace('[','', $geneset);
            $geneset= str_replace(']', '', $geneset);
            #echo($geneset);

            EnrichementScore::where([
                ['pval','=',$value[1]],
                ['padj','=',$value[2]],
                ['es','=',$value[3]],
                ['nes', '=', $value[4]],
                ['moreextreme', '=', $value[5]]])->update(['geneset_id'=>$geneset]);
            
        }
    }
}
