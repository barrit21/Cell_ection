<?php

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
        
        $fichier = file('./storage/Data/expression_level_MCF7.txt',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        
        $genes_table=Gene::all();
        $celline_dataset_table=CellineDataset::all();

        $tab_result = array();

        $raw_files=[];

        foreach ($fichier as $line) {
            if(!empty($line)){
                $row= explode("\t", $line);
                if(preg_match('/^Raw\sFile/',$row[0])){
                    unset($row[0]);
                    foreach ($row as $filename) {
                        $filename= str_replace('"', '', $filename);
                        if ($celline_dataset_table->contains('file',$filename)===false){
                            DB::table('celline_dataset')->insert([
                                'file'=>$filename]);
                        }
                        array_push($raw_files, $filename);
                    }
                }
            }
        }
                
        $datasets=[];

        foreach ($fichier as $line) {
            if (!empty($line)){
                
                $row= explode("\t", $line);

                if(preg_match('/^Raw\sFile/',$row[0])){
                    //echo("rawfile");
                    unset($row[0]);
                }

                elseif (preg_match('/^Dataset/',$row[0])){
                    //echo('dataset');
                    unset($row[0]);
                }
                
                else{
                    $data =explode("\t", $line);
                    $gene_name= str_replace('"', '',$data[0]);
                    if($genes_table->contains('hugo', $gene_name)===false){
                        DB::table('genes')->insert([
                            'hugo'=> ($gene_name),
                        ]);
                    }

                    $gene=Gene::where('hugo', $gene_name)->first();

                    unset($data[0]);

                    $index=count($data);

                    for ($i=0 ; $i < $index ; $i++){
                        //echo($i);
                        $celline_dataset=CellineDataset::where('file', $raw_files[$i])->first();
                        
                        $Exp = Expressionlevel::firstOrCreate([
                            "expression" => round($data[$i+1],3),
                            "gene_id" => $gene -> id, 
                            "celline_dataset_id" => $celline_dataset -> id ,
                             ]); 
                    }
                }
            }
        }
    }
}