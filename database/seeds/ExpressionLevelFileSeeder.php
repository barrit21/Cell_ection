<?php
ini_set("memory_limit","-1");
/**
 * @file ExpressionLevelFileSeeder.php
 */

use Illuminate\Database\Seeder;
use App\CellineDataset;
use App\Expressionlevel;
use App\Gene;
use App\Celline;
use App\Dataset;
use Carbon\Carbon;

/**
 * @class ExpressionLevelFileSeeder
 */
class ExpressionLevelFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $file1=file('storage/Data/ranked_gene_list_BT474_versus_REST.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        unset($file1[0]);

        foreach ($file1 as $value) {
            $value=explode("\t",$value);

            DB::table('expressionlevels')->insert([
                'celline_id'=>(2),
                'name'=>($value[0]),
                'gene_symbol'=>($value[2]),
                'gene_title'=>($value[3]),
                'score'=>($value[4]),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),

            ]);
        }

        $file2=file('storage/Data/ranked_gene_list_HCC38_versus_REST.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        unset($file2[0]);

        foreach ($file2 as $value) {
            $value=explode("\t",$value);

            DB::table('expressionlevels')->insert([
                'celline_id'=>(9),
                'name'=>($value[0]),
                'gene_symbol'=>($value[2]),
                'gene_title'=>($value[3]),
                'score'=>($value[4]),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),

            ]);
        }

        $file3=file('storage/Data/ranked_gene_list_MCF7_versus_REST.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        unset($file3[0]);

        foreach ($file3 as $value) {
            $value=explode("\t",$value);

            DB::table('expressionlevels')->insert([
                'celline_id'=>(1),
                'name'=>($value[0]),
                'gene_symbol'=>($value[2]),
                'gene_title'=>($value[3]),
                'score'=>($value[4]),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),

            ]);
        }

        $file4=file('storage/Data/ranked_gene_list_MDAMB453_versus_REST.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        unset($file4[0]);

        foreach ($file4 as $value) {
            $value=explode("\t",$value);

            DB::table('expressionlevels')->insert([
                'celline_id'=>(3),
                'name'=>($value[0]),
                'gene_symbol'=>($value[2]),
                'gene_title'=>($value[3]),
                'score'=>($value[4]),
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),

            ]);

            //dd($value); */


        //New file about means
        $filemean=file('storage/Data/expression.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        //$header = explode(',', $filemean[0]);
        unset($filemean[0]);
        foreach($filemean as $value){
          //$expression=Expressionlevel::all();
          $infos=explode(',',$value);
          $infos[1]=trim($infos[1],'"');
          $infos[2]=trim($infos[2],'"');
          //if(Expressionlevel::where([['name',$infos[2]],['expression',$infos[3]]])->exists()){
            //;
          //}
          //else{
            $geneid=Gene::where('hugo',$infos[1])->pluck('idgene');
            $arrayid=CellineDataset::where('file',$infos[2])->pluck('idarray');
            DB::table('expressionlevels')->insert([
              'idgene'=>($geneid[0]),
              'name'=>($infos[1]),
              'idarray'=>($arrayid[0]),
              'expression'=>($infos[3]),
            ]);
          //}
        }
        /*
        //dd($header);
        $error=array();

        unset($filemean[0]);


        foreach ($filemean as $value) {
            $gene = explode(",", $value);

            //dd($gene);

            for ($i=1; $i< count($header); $i++){
                $cell=$header[$i];
                $means=$gene[$i];

                echo("\n".$gene[0]." ".$cell." ".$means." ");

                //cell line exist
                $ligneselect=DB::table('cellines')
                ->select('id')
                ->where('cellines.name', '=', $cell)
                ->get();

                $idcell=$ligneselect[0]->id;


                if (empty($idcell)) {
                    //ERROR, cell line no referencied
                    $error[]=$cell." unknown";
                } else {
                    //if couple gene/cell value exist
                    $ligneselect=DB::table('expressionlevels')
                    ->select('id')
                    ->where([
                        ['celline_id', '=', $idcell],
                        ['name', '=', $gene[0]]
                    ])
                    ->get();

                    //dd($ligneselect);

                    if ($ligneselect->isEmpty()) {
                        DB::table('expressionlevels')->insert([
                            'celline_id'=>$idcell,
                            'name'=>$gene[0],
                            'meanexp'=>$means,
                            'created_at'=>date("Y-m-d h:i:s")
                        ]);
                        echo "INSERTION...";
                    }
                    else {
                        echo "MAJ...";
                        $id=$ligneselect[0]->id;
                        echo "recherche du couple :".$id;

                        DB::table('expressionlevels')
                        ->where('id','=',$id)
                        ->update([
                            'meanexp'=>$means,
                            'updated_at'=>date("Y-m-d h:i:s")
                        ]);
                    }

                }

            }

        }

        if (count($error)>0) {
            echo implode('\n', $error);
        }


        //New file about sd
        //$filesd=file('storage/Data/cline.sd.symbols.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        //}*/
    }
}
