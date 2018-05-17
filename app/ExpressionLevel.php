<?php

/**
 * @file ExpressionLevel.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * @class Expressionlevel
 */
class Expressionlevel extends Model
{
	/**
	 * @brief Create relations between models
	 */
     public function celline()
    {
    	return $this->belongsTo('App\Celline');
    }
    public function enrichementscores()
    {
    	return $this->belongsTo('App\Enrichementscore');
    }
    public static function expressionlevel_table(){
        $explevels=DB::table('expressionlevels')->get();
        //dd($explevels);
        return $explevels;        
    }
}