<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Gene;
use App\Dataset;
use App\Celline;
use App\Expressionlevel;

class ExpressionLevelFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	#faire une boucle for, pour choisir les colonnes mais à voir les clés étrangères !! 
        /*
         * RAJOUTER LA GESTION D'ERREUR SI CELLINE ou DATASET NON RETROUVE
         */   
        
        $fichier = file('./storage/Data/expression_level_MCF7.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $tab_result = array();

        $raw_files = [];
        $datasets = [];

        foreach ($fichier as $line) {
            if (!empty($line)) {
                $row = explode("\t", $line);

                if(preg_match('/^Raw\sFile/',$row[0])){
                    unset($row[0]);
                    foreach($row as $cellFile){
                        $filename = str_replace('"','',$cellFile);
                        array_push($raw_files,$filename);
                    }
                } else if(preg_match('/^Dataset/',$row[0])){
                    unset($row[0]);
                    foreach($row as $dataset){
                        $dataset_name = str_replace('"','',$dataset);
                        array_push($datasets,$dataset_name);
                    }
                } else {
                    $data = explode("\t",$line);
                    $gene_name = str_replace('"','',$data[0]);
                    $gene = Gene::where('hugo',$gene_name)->first();
                    
                    if($gene == null){
                        $gene = new Gene();
                        $gene -> hugo = $gene_name;
                        $gene -> uniprot = 0;
                        $gene -> save();
                    }

                    unset($data[0]);
                    foreach($data as $key => $value ){
                        $index = $key - 1;
                        $celline_dataset = \DB::table('celline_dataset')->where('file', $raw_files[$index])->first();

                        if($celline_dataset == null){
                            $celline_name = explode('_',$raw_files[$index])[0];
                            $celline = Celline::where('name', $celline_name)->first();
                            if($celline == null){
                                $celline_name = str_replace('-','',$celline_name);
                                $celline = Celline::where('name', $celline_name)->first();
                                if($celline == null){
                                    // dump($celline_name . " NON RETROUVE");
                                    continue;
                                }
                            }
                            
                            $dataset = Dataset::where('name',$datasets[$index])->first();
                            if($dataset == null){
                                // dump($datasets[$index]);
                                continue;
                            }
                            DB::table('celline_dataset')->insert([
                                "file" => $raw_files[$index],
                                "celline_id" => $celline -> id,
                                "dataset_id" => $dataset -> id,
                                "created_at" => Carbon::now(),
                                "updated_at" => Carbon::now(),
                            ]);
                            $celline_dataset = \DB::table('celline_dataset')->where('file', $raw_files[$index]) -> first();
                        }

                        $ex = Expressionlevel::firstOrCreate([
                            "expression" => round($value,3),
                            "gene_id" => $gene -> id,
                            "celline_dataset_id" => $celline_dataset -> id
                        ]);
                    }
                }
            }
        }
        
    }
   
}

