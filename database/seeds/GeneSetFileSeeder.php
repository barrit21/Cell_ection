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
        $fichier=file('storage/Data/geneset_reactome_L.txt',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $genes=Gene::all();


        //print_r($fichier);

   

        /**
        Remplissage de Geneset, Genes (uniprot)
        */
       
        $e=0;
        foreach ($fichier as $key => $value) {
            //for ($i=0 ; $i < count($dataset) ; ){
                //$g$i=array($value);
        	if(strpos($value, "$")===0){
                $dataset[]=$value;
    			$value=str_replace('$','', $value);
                $value=trim($value);
                $value=str_replace('`', '', $value);
    			DB::table('genesets')->insert([
    				'name'=>($value),
                    'created_at'=>Carbon::now(),
                    'updated_at' => Carbon::now(),
    			]);
                $e++;
                $g{$e} = array($value);
                //echo($e);
            }
    		else{
                $l=explode(',', $value);
                foreach ($l as $uniprot) {
                    array_push($g{$e}, $uniprot);

                    if ($genes->contains('uniprot',$uniprot)===false){
                        //echo($uniprot);
                        //echo(" ");
                        DB::table('genes')->insert([
                            'uniprot'=>$uniprot]);
                    }
                }
                //print_r($g{$e});
               
            }

           
        }
        //print_r($g);
       
        for($i=1 ; $i <= count($dataset) ; $i++){
            $d=$g{$i}[0];
            for($a=1 ; $a < count($g{$i}) ; $a++){
                $h=$g{$i}[$a];
                $x=Gene::where('uniprot',$h)->first();
                $y=Geneset::where('name',$d)->first();
                $x -> genesets() -> attach($y -> id);
            }
        }
    
    }
}
