<?php
ini_set("memory_limit","-1");

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
        $fichier=file('./storage/Data/gsea.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        unset($fichier[0]);

        $geneset_table=Geneset::all();
        $line_table=Celline::all();


        foreach ($fichier as $value) {
          $value=explode(',', $value);
          $value[1]=trim($value[1],'"');
          $value[2]=trim($value[2],'"');
          $value[9]=trim($value[9],'"');
          if($value[6]==="NA"){
            $value[6]=-1;
          }
          if ($geneset_table->contains('name',$value[2])===false){
              DB::table('genesets')->insert([
                  'name'=>$value[2],
              ]);
              $genesetid=Geneset::where('name',$value[2])->pluck('idgeneset');
          }
          else{
            $genesetid=Geneset::where('name',$value[2])->pluck('idgeneset');
          }
          if ($line_table->contains('name',$value[1])===false){
              DB::table('celllines')->insert([
                  'name'=>$value[1],
              ]);
              $cellineid=Celline::where('name',$value[1])->pluck('idcelline');
          }
          else{
            $cellineid=Celline::where('name',$value[1])->pluck('idcelline');
          }
        	DB::table('enrichementscores')->insert([
              'idcelline'=>($cellineid[0]),
              'idgeneset'=>($genesetid[0]),
            	'pval'=>($value[3]),
            	'padj'=>($value[4]),
            	'ES'=>($value[5]),
            	'NES'=>($value[6]),
            	'nMoreExtreme'=>($value[7]),
              'size'=>($value[8]),
              'leadingEdge'=>($value[9]),
            ]);

/*            if ($geneset_table->contains('name',$value[0])===false){
                DB::table('genesets')->insert([
                    'name'=>$value[0],
                ]);
            }*/

            /*
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
            */
        }
    }
}
