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
        $fichier=file('storage/Data/geneset_test.txt',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $genes=Gene::all();


        //print_r($fichier);
    

        foreach ($fichier as $line) {
            if (strpos($line, "$")===0){
                $dataset[]=$line;
            }
            else{

                $g[]=$line;
            }
        }
   
*/

        /**
        Remplissage de Geneset, Genes (uniprot)
        */
        $e=0;
        foreach ($fichier as $key => $value) {
            //for ($i=0 ; $i < count($dataset) ; ){
                //$g$i=array($value);
        	if(strpos($value, "$")===0){
    			$value=str_replace('$','', $value);
                $value=trim($value);
                $value=str_replace('`', '', $value);
    			DB::table('genesets')->insert([
    				'name'=>($value)
                    //'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
    			]);
                $e++;
                $g{$e} = array($value);
                //echo($e);
            }
    		else{
                $value=str_replace('"', '', $value);
                $l=explode(' ', $value);
                unset($l[0]);
                //print_r($l);
                foreach ($l as $key) {
                    //echo($key);
                    $key
                    array_push($g{$e}, $key);
                    if ($genes->contains('uniprot',$key)===false){
                        echo("oui");
                        DB::table('genes')->insert([
                            'uniprot'=>$key]);
                    }
                }
                //print_r($g{$e});
               
            }

           
        }
        //print_r($g{2});
        //echo(count($g{2}));

        for($i=1 ; $i <= count($dataset) ; $i++){
            $d=$g{$i}[0];
            for($a=1 ; $a < count($g{$i}) ; $a++){
                $h=$g{$i}[$a];
                $x=Gene::where('uniprot',$h)->first();
                $y=Geneset::where('name',$d)->first();
                //$x -> genesets() -> attach($y -> id);
            }
        }


       

    
    }
}
