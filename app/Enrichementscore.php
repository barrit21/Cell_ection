<?php

/**
 * @file Enrichementscore.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * @class Enrichementscore
 */
class Enrichementscore extends Model
{
	/**
	 * @brief Create relations between models
	 */
    public function celline()
    {
    	return $this->belongsTo('App\Celline');
    }
    public function genesets()
    {
    	return $this->belongsTo('App\Geneset');
    }
    public static function enrichementscore_table(){
        $enriscores=DB::table('enrichementscores')->get();
        //dd($enriscores);
        return $enriscores;        
    }
}