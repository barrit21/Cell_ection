<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Gene;
use App\Geneset;
class GeneSetFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fichier=file('storage/Data/geneset_test.txt');

        $genes=Gene::all();


        print_r($fichier);

        foreach ($fichier as $line) {
            if (strpos($line, "$")===0){
                $dataset[]=$line;
            }
            else{

                $g[]=$line;
            }
        }
        #print_r($g);
        #print_r($dataset);
        #echo(count($dataset));

        $table=array();
        $geneset=array();

        for ($i=0; $i < count($fichier) ; $i++) { 
            if (strpos($fichier[$i], "$")===0){
                unset($fichier[$i-1]);
                $d=str_replace('$`', '', $fichier[$i]);
                $d=str_replace('`', '', $d);

                $e=0;

                while (strpos($fichier[$i+1],"$")===0){
                    $geneset[]=$fichier[$i+1];
                    $e=$i;
                    $i=$i+1;
                }

                print_r($geneset);
                echo($e);
            }

        }

        #print_r($table);
        foreach ($table as $dataset => $gen) {
            
        }

        /*


        foreach ($fichier as $key => $value) {
    		if(strpos($value, "$")===0){
    			$value=str_replace('$','', $value);
                $value=trim($value);
                $value=str_replace('`', '', $value);
    			DB::table('genesets')->insert([
    				'name'=>($value),
                    #'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
    			]);
    		}

    		else{
                
                $value=str_replace('"', '', $value);
                echo($value);


                if ($genes->contains('uniprot',$value)===false){
                    DB::table('genes')->insert([
                        'uniprot'=>$value]);
                }

    		      #foreach ($value as $gene=>$bam) {
    		//		$gene=str_replace('"', '', $gene);
    				//DB::table('genes')->insert([
    				//	'uniprot'=>($gene),
    		//		]);
    		//	}
    		}
    	}

        */
    }
}
