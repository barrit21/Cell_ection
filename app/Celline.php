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
        ->join('vanderbilts', 'celline_dataset.vanderbilt_id', '=', 'vanderbilts.id')
        ->join('citbcmsts', 'celline_dataset.citbcmst_id', '=', 'citbcmsts.id')
        ->join('datasets', 'datasets.id', '=', 'celline_dataset.dataset_id')
        ->select('datasets.name', 'vanderbilts.class as classv', 'vanderbilts.correlation', 'vanderbilts.pval', 'citbcmsts.class')
        ->where('celline_dataset.celline_id', $id_cell)
        ->get();        
        
        //dd($data);
        return $data;
    }

    public static function genes_active($id)
    {
        $id_cell = $id;
        $genes_actives = DB::table('expressionlevels')
        ->join('cellines', 'expressionlevels.celline_id', '=', 'cellines.id' )
        ->where('cellines.id', $id_cell)
        ->select('expressionlevels.name', 'expressionlevels.gene_symbol', 'expressionlevels.gene_title', 'expressionlevels.score')
        ->get();

        //dd($genes_actives);
        return($genes_actives);
    }

    public static function get_gsea_results($id)
    {
        $id_cell = $id;
        $gsea_results = DB::table('enrichementscores')
        ->where('celline_id', $id)
        ->get();

        //dd($gsea_results);
        return($gsea_results);
    }

    public static function valide_results($id)
    {
        $id_cell=$id;
        $validation = DB::table('enrichementscores')
        ->where('celline_id', $id)
        ->where('enrichementscores.FDRqval', '<', 0.25)
        ->get();

        //dd($validation);
        return($validation);
    }

    public static function fpval1percent($id)
    {
        $id_cell=$id;
        $pval1percent = DB::table('enrichementscores')
        ->where('celline_id', $id)
        ->where('enrichementscores.NOMpval', '<', 0.01)
        ->get();

        //dd($validation);
        return($pval1percent);        
    }

    public static function fpval5percent($id)
    {
        $id_cell=$id;
        $pval5percent = DB::table('enrichementscores')
        ->where('celline_id', $id)
        ->where('enrichementscores.NOMpval', '<', 0.05)
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
