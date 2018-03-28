<?php

/**
 * @file Geneset.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}