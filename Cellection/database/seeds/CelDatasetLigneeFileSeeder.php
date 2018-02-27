<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CelDatasetLigneeFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fichier=file('./storage/Data/cel_dataset_lignee.txt');
        unset($fichier[0]);

        $datasets=App\Dataset::all();
        $cellines=App\Celline::all();

        $dataset=DB::table('datasets')->distinct()->get();
        $dataset=$dataset->toArray();
        
        foreach ($fichier as $value) {
        	$value=explode("\t",$value);

        	//echo'<pres>';
        	//print_r($value);
        	//echo'</pres>';

            #si datasets du fichier cel_dataset_lignee.txt n'existe pas déjà dans la table l'ajouter. 
            if ($datasets->contains('name', $value[0])===false){
                echo('hola1');
                DB::table('datasets')->insert([
                    'name'=>($value[0]),
                    'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }
            #pareil pour cellines
            if ($cellines->contains('name',$value[2])===false){
                echo ('hola2');
                DB::table('cellines')->insert([
                    'name'=>($value[2]),
                    'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }
    
        	DB::table('cellinedatasets')->insert([
                'file'=>($value[1]),
                'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
            ]);

            foreach ($dataset as $data) {
                DB::table('cellinedatasets')->
            }
            #ajout des clés étrangères à cellinedatasets
            
        }


        
        
        foreach ($dataset as $data) {
            DB::table('cellinedatasets')->insert([
                'file'=>
                'datasets_id'=>($data->id),
            ]);
        }
        
        //$id_datasets=DB::table('datasets')->select('id')->where('name',$value[0])->get();
            //echo($id_datasets);
           
    }
}
