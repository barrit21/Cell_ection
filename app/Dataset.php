<?php

/**
 * @file Dataset.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Quotation;

/**
 * @class Dataset
 */
class Dataset extends Model
{
    /**
     * @brief Create relations between models
     */
    public function cellines()
    {
        return $this -> belongsToMany('\App\Celline');
    }
    public function citbcmsts()
    {
        return $this->belongsToMany('App\Citbcmst', 'CellineDataset');
    }
    public function vanderbilts()
    {
        return $this->belongsToMany('App\Vanderbilt', 'CellineDataset');
    }


    public static function index(){
        $datasets=DB::table('datasets')->get();
        return $datasets;
    }
}