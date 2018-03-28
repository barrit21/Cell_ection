<?php

/**
 * @file ExpressionLevel.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}