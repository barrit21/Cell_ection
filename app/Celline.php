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
        ->join('datasets', 'datasets.id', '=', 'celline_dataset.dataset_id')
        ->select('celline_dataset.id', 'datasets.name')
        ->where('celline_dataset.celline_id', $id_cell)
        ->get();
        
        //dd($data);

        return $data;
    }

    public static function classif($id)
    {
        $id_cell = $id;
        $dataclassif = DB::table('celline_dataset')
        ->join('vanderbilts', 'celline_dataset.vanderbilt_id', '=', 'vanderbilts.id')
        ->join('citbcmsts', 'celline_dataset.citbcmst_id', '=', 'citbcmsts.id')
        ->select('celline_dataset.id', 'vanderbilts.class as classv', 'vanderbilts.correlation', 'vanderbilts.pval', 'citbcmsts.class')
        ->where('celline_dataset.celline_id', $id_cell)
        ->get();

        //dd($dataclassif);

        return $dataclassif;

    }

    /*public static function gsea($id)
    {
        $id_cell = $id;
    }*/
}
