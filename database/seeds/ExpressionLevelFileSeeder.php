<?php

use Illuminate\Database\Seeder;
use App\CellineDataset;
use App\Expressionlevel;
use App\Gene;
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
    	#faire une boucle for, pour choisir les colonnes mais à voir les clés étrangères !! 
        
        $fichier = file('./storage/Data/expression_level_MCF7.txt');
        
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


        /**
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
                   ]);

                }
    
                for ($i=1; $i <=15 ; $i++) {
                    echo($i);
                    $files[$i]=str_replace('"','',$files[$i]);
                    
                    $idfile=CellineDataset::where('file',$files[$i])->first();
                    */
                    /**
                    DB::table('expressionlevels')->insert([
                        'expression'=>($express[$i]),
                        'gene_id'=>($gene),
                        'celline_dataset_id'=>($idfile),
                    ]);
                #}

        } 
        */          

        
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

