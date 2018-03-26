<?php

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use App\Celline;
use App\Dataset;
use App\Vanderbilt;
use App\Citbcmst;

class CelDatasetLigneeFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Ce seed récupère les informations du fichier cel_dataset_lignee.txt présent dans storage/Data/ et les utilise pour remplir la table celline_dataset. 
         * Il vérifie également que les informations de ce fichiers sont déjà présentes dans les tables cellines et datasets prélablement peuplées.
         */
        
        #Récupération des données du fichier 
        $fichier=file('./storage/Data/cel_dataset_lignee.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        #Supression de la 1ère ligne (nom des colonnes)
        unset($fichier[0]);

        foreach ($fichier as $value) {
            $value=explode("\t",$value);
            $value[2]=trim($value[2]);

            //$dataset= Dataset::firstOrNew(['name'=>$value[0]]);
            
            $dataset=Dataset::all();

            #Vérification que le dataset est déjà présent dans dataset
            if ($dataset->contains('name', $value[0])===false){
                #echo("hola1");
                DB::table('datasets')->insert([
                    'name'=>($value[0]),
                ]);
            }

            //$celline= Celline::firstOrNew(['name'=>$value[2]]);
            
            $celline=Celline::all();
            #Vérification que la celline est déjà présente dans cellines
            if ($celline->contains('name',$value[2])===false){
                #echo("hola2");
                DB::table('cellines')->insert([
                    'name'=>($value[2]),
                ]);
            }


            #Intégration des données dans celline_dataset
    
            $dataset=Dataset::where('name',$value[0])->first();
            $celline=Celline::where('name',$value[2])->first();
            $filename=str_replace('-','.',$value[1]);

            

           
            $dataset -> cellines() -> attach($celline -> id, [
               'file' => $filename]);

            
        } 
        
    }

}
