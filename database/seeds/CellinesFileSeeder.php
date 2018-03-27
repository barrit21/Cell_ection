<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CellinesFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Ce seed récupère les informations du fichier cell_lines.txt de storage/Data/ et les intègrent dans la table celline.
         */
        
        #Récupération des données du fichier 
        $fichier=file('./storage/Data/cell_lines.txt',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        #Supprime la 1ère ligne (nom des colonnes)
        unset($fichier[0]);

        foreach($fichier as $key){
            $infos=explode("\t", $key);
            $infos[0]=str_replace('"','',$infos[0]);
            $infos[2]=trim($infos[2]);
            DB::table('cellines')->insert([
                'name'=>($infos[0]),
                'replicate'=>intval($infos[2]),
            ]);
        }
    }
}