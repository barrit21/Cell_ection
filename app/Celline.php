<?php

/**
 * @file Celline.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Quotation;
use App\Celline;
use App\Cellinedataset;
use App\Dataset;


/**
 * @class Celline
 */
class Celline extends Model
{
    /**
     *
     * @brief   Create relations between models
     *
     * @var        array
     *
     */
    public function datasets()
    {
        return $this->belongsToMany('App\Dataset');
    }
    public function vanderbilts()
    {
        return $this->belongsToMany('App\Vanderbilt');
    }
    public function citbcmsts()
    {
        return $this->belongsToMany('App\Citbcmst');
    }
    public function expressionlevels()
    {
        return $this->hasManyThrough('App\Expressionlevel', 'App\CellineDataset');
    }
     public function enrichementscores()
    {
        return $this->hasManyThrough('App\Enrichementscore','App\CellineDataset');
    }

    public static function liste_cell_datasets($id)
    {
        $id_cell = $id;
        $data = DB::table('celline_dataset')
        ->join('datasets', 'datasets.iddataset', '=', 'celline_dataset.iddataset')
        ->select('datasets.name', 'celline_dataset.subtype as classv', 'celline_dataset.correlation', 'celline_dataset.pval', 'celline_dataset.citbcmst', 'celline_dataset.citbcmst_mixed', 'celline_dataset.citbcmst_core')
        ->where('celline_dataset.idcelline', $id_cell)
        ->get();

        //dd($data);
        return $data;
    }

    public static function genes_active($id)
    {
      $genes_active=[];
      foreach($id as $id_cell){
        $genes_actives[] = DB::table('expressionlevels')
        ->join('genes', 'expressionlevels.idgene', '=', 'genes.idgene' )
        ->where('expressionlevels.idarray', $id_cell)
        ->select('expressionlevels.name', 'expressionlevels.expression')
        ->get();
      }
      //dd($genes_actives);
      return($genes_actives);
    }

    public static function get_gsea_results($id)
    {
        $id_cell = $id;
        $gsea_results = DB::table('enrichementscores')
        ->where('idcelline', $id)
        ->get();

        //dd($gsea_results);
        return($gsea_results);
    }

    public static function valide_results($id)
    {
        $id_cell=$id;
        $validation = DB::table('enrichementscores')
        ->where('idcelline', $id)
        ->where('enrichementscores.pval', '<', 0.25)
        ->get();

        //dd($validation);
        return($validation);
    }

    public static function fpval1percent($id)
    {
        $id_cell=$id;
        $pval1percent = DB::table('enrichementscores')
        ->where('idcelline', $id)
        ->where('enrichementscores.pval', '<', 0.01)
        ->get();

        //dd($validation);
        return($pval1percent);
    }

    public static function fpval5percent($id)
    {
        $id_cell=$id;
        $pval5percent = DB::table('enrichementscores')
        ->where('idcelline', $id)
        ->where('enrichementscores.pval', '<', 0.05)
        ->get();

        //dd($validation);
        return($pval5percent);
    }

    public static function get_nb_pathways()
    {
        $nbpathways = DB::table('genesets')
        ->count();
        return $nbpathways;
    }

    public static function celline_table(){
        $cell_lines=DB::table('cellines')->get();
        //dd($cell_lines);
        return $cell_lines;
    }

}
