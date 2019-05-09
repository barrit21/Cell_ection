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
        $query="(SELECT iddataset,file,idarray,subtype,correlation,pval,citbcmst,citbcmst_confidence FROM celline_dataset WHERE idcelline=$id_cell) as cellinedataset";
        $data = DB::table('datasets')
        ->join(DB::raw($query), 'cellinedataset.iddataset', '=', 'datasets.iddataset')
        ->select('datasets.name','cellinedataset.file','cellinedataset.idarray','cellinedataset.subtype','cellinedataset.correlation','cellinedataset.pval','cellinedataset.citbcmst','cellinedataset.citbcmst_confidence')
        ->get();
        /*$query="(SELECT iddataset, subtype, correlation, pval, citbcmst, citbcmst_mixed, citbcmst_core FROM celline_dataset WHERE idcelline = $id_cell) as p";
        $data=DB::table('datasets')
        ->join(DB::raw($query), 'p.iddataset','=','celline_dataset.iddataset')
        ->select('datasets.name', 'celline_dataset.subtype as classv', 'celline_dataset.correlation', 'celline_dataset.pval', 'celline_dataset.citbcmst', 'celline_dataset.citbcmst_mixed', 'celline_dataset.citbcmst_core')
        ->where('celline_dataset.idcelline', $id_cell)
        ->get();
        /*$data1=DB::table('celline_dataset')
        ->select('iddataset','subtype as classv','correlation','pval','citbcmst','citbcmst_mixed','citbcmst_core')
        ->where('idcelline',$id_cell)
        ->get();
        $data2=DB::table('datasets')
        ->select('datasets.name')
        ->join($data1, 'datasets.iddataset', '=', 'celline_dataset.iddataset')
        ->get();*/
        //$data=$data1.$data2;

        //dd($data);
        return $data;
    }

    public static function genes_active($id)
    {
      $query="(SELECT idarray FROM celline_dataset WHERE idcelline=$id) as cellinedataset";
      $genesactives = DB::table('expressionlevels')
      ->join(DB::raw($query), 'cellinedataset.idarray', '=', 'expressionlevels.idarray' )
      ->select('expressionlevels.name', 'expressionlevels.idgene', 'expressionlevels.expression')
      ->get();
      //dd($genes_actives);
      return($genesactives);
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
