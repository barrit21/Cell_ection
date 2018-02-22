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
        $fichier=file('./storage/Data/expression_level_MCF7.txt');
        //$file=explode('"',$fichier[0]);

        //foreach ($file as $value) {
        //	DB::table('citbcmsts')->insert([
        //        'class'=>($value[3]),
        //        'classmixed'=>($value[5]),
        //        'classcore'=>($value[7]),
        //        'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
        //    ]);
        //}
        //foreach ($fichier as $part) {
        //	if (strpos($part, "Raw File")===0){
        //		echo("hola");
        //	};
        //}
    }
}
