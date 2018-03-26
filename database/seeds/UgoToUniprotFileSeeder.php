<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Gene;

class UgoToUniprotFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fichier=file('./storage/Data/reactome.entrez2sym.txt');
        unset($fichier[0]);
        /*
        if ($dataset->contains('name', $value[0])===false){
                DB::table('datasets')->insert([
                    'name'=>($value[0]),
                    #'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }
        */
       
        $genetable=Gene::all();
        
        foreach ($fichier as $key) {
        	$key=explode("\t",$key);
            $key[1]=trim($key[1]);

            if($genetable->contains('hugo',$key[1])===false){
                //echo($key[1]);
                DB::table('genes')->insert([
                    'hugo'=>($key[1]),
                    'uniprot'=>($key[0]),
                ]);
            }
            else{
                $hugo=Gene::where('hugo',$key[1])->update(['uniprot' => $key[0]]);
            }

        	#DB::table('genes')->insert([
            #    'hugo'=>($key[1]),
            #    'uniprot'=>($key[0]),
                #'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),

         	#]);

        }
    }
}
