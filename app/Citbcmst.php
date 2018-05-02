<?php

/**
 * @file Citbcmst.php
 */
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * @class Citbcmst
 */
class Citbcmst extends Model
{
    /**
     * @brief Create relations between models
     */
    public function datasets()
    {
        return $this->belongsToMany('App\Dataset', 'CellineDataset');
    }
    public function cellines()
    {
        return $this->belongsToMany('App\Celline', 'CellineDataset');
    }
    public function vanderbilts()
    {
        return $this->belongsToMany('App\Vanderbilt', 'CellineDataset');
    }
    public function celline_dataset()
    {
        return $this->hasOne('App\CellineDataset');
    }
    public function expressionlevels()
    {
        return $this->hasManyThrough('App\Expressionlevel', 'App\CellineDataset');
    }
    public function enrichementscores()
    {
        return $this->hasManyThrough('App\Enrichementscore','App\CellineDataset');
    }
    public static function citbcmst_table(){
        $citbcmsts=DB::table('citbcmsts')->get();
        //dd($citbcmsts);
        return $citbcmsts;        
    }
}