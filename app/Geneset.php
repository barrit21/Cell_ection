<?php

/**
 * @file Geneset.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * @class
 */
class Geneset extends Model
{
	/**
	 * @brief Create relations between models
	 */
    public function genes()
    {
    	return $this->belongsToMany('App\Gene');
    }
    public function enrichementscores()
    {
    	return $this->hasMany('App\Enrichementscore');
    }
    public static function geneset_table(){
        $genesets=DB::table('genesets')->get();
        //dd($genesets);
        return $genesets;        
    }
}