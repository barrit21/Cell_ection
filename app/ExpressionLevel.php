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
     public function celline_dataset()
    {
    	return $this->belongsTo('App\CellineDataset');
    }
    public function genes()
    {
    	return $this->belongsTo('App\Gene');
    }
    public static function expressionlevel_table(){
        $explevels=DB::table('expressionlevels')->get();
        //dd($explevels);
        return $explevels;        
    }
}