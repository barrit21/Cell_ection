<?php

use Illuminate\Database\Seeder;
use App\Celline;

class ExpressionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fichier=file('storage/Data/expression.mean.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $firstline=explode(',',$fichier[0]);
        $liste=[];
        unset($firstline[0]);
        foreach ($firstline as $celline) {
          $celline=trim($celline,'"');
          $cellineid=Celline::where('name',$celline)->pluck('idcelline');
          array_push($liste,$cellineid[0]);
        }
        unset($fichier[0]);
        foreach($fichier as $file){
          $line=explode(',',$file);
          $gene_id=$line[0];
          $a=0;
          unset($line[0]);
          foreach($line as $expr){
            DB::table('expressionmean')->insert([
              'idcelline'=>($liste[$a]),
              'idgene'=>($gene_id),
              'expression_mean'=>($expr)
            ]);
            $a=$a+1;
          }
        }
        $fichier=file('storage/Data/expression.sd.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $firstline=explode(',',$fichier[0]);
        $liste=[];
        unset($firstline[0]);
        foreach ($firstline as $celline) {
          $celline=trim($celline,'"');
          $cellineid=Celline::where('name',$celline)->pluck('idcelline');
          array_push($liste,$cellineid[0]);
        }
        unset($fichier[0]);
        foreach($fichier as $file){
          $line=explode(',',$file);
          $gene_id=$line[0];
          $a=0;
          unset($line[0]);
          foreach($line as $expr){
            DB::table('expressionmean')
            ->where([['idcelline','=',($liste[$a])],['idgene','=',$gene_id]])
            ->update(['expression_sd'=>($expr)]);
            $a=$a+1;
          }
        }
    }
}
