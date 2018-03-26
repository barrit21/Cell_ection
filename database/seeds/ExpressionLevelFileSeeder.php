<?php

use Illuminate\Database\Seeder;
use App\CellineDataset;
use App\Expressionlevel;
use App\Gene;
use App\Celline;
use App\Dataset;
use Carbon\Carbon;

/** 
 * A reprendre erreur de datetime ??
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
        $tab_result = array();

        $raw_files=[];
        $datasets=[];

        foreach ($fichier as $line) {
            if (!empty($line)){
                $row =explode("\t", $line);

                if(preg_match('/^Raw\sFile/',$row[0])){
                    unset($row[0]);
                    foreach ($row as $cellFile) {
                        $filename= str_replace('"','',$cellFile);
                        array_push($raw_files, $filename);
                    }
                }else if(preg_match('/^Dataset/', $row[0])){
                    unset($row[0]);
                    foreach ($row as $dataset) {
                        $dataset_name = str_replace('"','', $dataset);
                        array_push($datasets, $dataset_name);
                    }
                }else{
                    $data =explode("\t", $line);
                    $gene_name =str_replace('"', '', $data[0]);
                    $gene=Gene::where('hugo',$gene_name)->first();

                    if ($gene == null){
                        $gene = new Gene();
                        $gene -> hugo=$gene_name;
                        $gene -> uniprot=0;
                        $gene -> save();
                    }

                    unset($data[0]);
                    foreach ($data as $key => $value) {
                        $index=$key-1;
                        $celline_dataset= \DB::table('celline_dataset')->where('file',$raw_files[$index])-> first();
                        if($celline_dataset==null){
                            $celline_name=explode('_', $raw_files[$index])[0];
                            $celline = Celline::where('name', $celline_name)->first();
                            if($celline == null){
                                $celline_name = str_replace('-', '', $celline_name);
                                $celline= Celline::where('name', $celline_name)-> first();
                                if($celline == null){
                                    //dump($datasets[$index]);
                                    continue;
                                }
                            }

                            $dataset= Dataset::where('name', $datasets[$index])->first();
                            if($dataset ==null){
                                //dump($datasets[$index]);
                                continue;
                            }

                            DB::table('celline_dataset')->insert([
                                "file"=>$raw_files[$index],
                                "celline_id" => $celline -> id,
                                "dataset_id" => $dataset -> id,
                                //"created_at" => Carbon::now(),
                                //"updated_at" => Carbon::now(),
                            ]);
                            $celline_dataset= \DB::table('celline_dataset')->where('file', $raw_files[$index])->first();
                        }

                        $ex = Expressionlevel::firstOrCreate([
                            "expression" => round($value,3),
                            "gene_id"=> $gene -> id,
                            "celline_dataset_id" => $celline_dataset -> id 
                        ]);
                    }
                }
            }
        }
        /**

        $files=explode("\t", $fichier[0]);
        unset($files[0]);
        $filenet=[];
        foreach ($files as $file) {
            $filenet[]=str_replace('"', '', $file);
        }
        #print_r($filenet);

        unset($fichier[0]);
        unset($fichier[1]);

        foreach ($fichier as $value) {
            $expression=explode("\t",$value);
            $gene=$expression[0];
            $gene=str_replace('"','',$gene);
            DB::table('genes')->insert([
                'hugo'=>($gene),
            ]);
        } 


        foreach ($fichier as $value) {
                $value=explode("\t",$value);
                $g=str_replace('"','',$value[0]);

                $geneid=Gene::where('hugo',$g)->first();
                for ($i=1 ; $i <= 15 ; $i++){
                    $idfile=CellineDataset::where('file',$filenet[$i])->first();
                    
                    DB::table('expressionlevels')->insert([
                       'expression'=>($value[1]),
                       'gene_id'=>($geneid),
                       'celline_dataset_id'=>($idfile),
                       #'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),

                   ]);

                }
                /**
                for ($i=1; $i <=15 ; $i++) {
                    //echo($i);
                    $files[$i]=str_replace('"','',$files[$i]);
                    
                    $idfile=CellineDataset::where('file',$files[$i])->first();

                    DB::table('expressionlevels')->insert([
                        'expression'=>($express[$i]),
                        'gene_id'=>($gene),
                        'celline_dataset_id'=>($idfile),
                    ]);

                }
                */

        //}
        /*     

        
        /**
        for ($i=1; $i<=2 ; $i++){
            $file[]=$fichier[$i];
        } 
        print_r($file);
        */
        /**
        foreach (explode("\n", $fichier) as $line) {
            if (!empty($line)) {
                $row = explode("\t", $line);
                $tab_result[] = array('RawFile' => $row[0],
                            'cel1' => $row[1],
                            'cel2' => $row[2],
                            'cel3' => $row[3],
                            'cel4' => $row[4],
                            'cel5' => $row[5],
                            'cel6' => $row[6],
                            'cel7' => $row[7],
                            'cel8' => $row[8],
                            'cel9' => $row[9],
                            'cel10' => $row[10],
                            'cel11' => $row[11],
                            'cel12' => $row[12],
                            'cel13' => $row[13],
                            'cel14' => $row[14]);
            }
        }
        
        */
    }
   
}

