<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
        
        $fichier = file_get_contents('./storage/Data/expression_level_MCF7.txt');
        $tab_result = array();


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
        
        //foreach ($tab_result as $key) {
        //    foreach ($key as $value) {
        //        echo($value[0]);
        //    }
        //}
    }
   
}

