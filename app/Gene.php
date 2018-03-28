<?php

/**
 * @file Gene.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Quotation;

/**
 * @class Gene
 */
class Gene extends Model
{
    /**
     * @brief Create relations between models
     */
    public function expressionlevels()
    {
        return $this->hasMany('App\Expressionlevel');
    }
    public function genesets()
    {
        return $this->belongsToMany('App\Geneset');
    }
    public static function liste_gene() 
    //Plus besoin de faire les jointures à la main après, y penser !
    {
    	$data = DB::table('genes')->select('genes.id','genes.hugo')->get();
    	return $data;
    }
}