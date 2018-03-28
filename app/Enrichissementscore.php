<?php

/**
 * @file Enrichementscore.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @class Enrichementscore
 */
class Enrichementscore extends Model
{
	/**
	 * @brief Create relations between models
	 */
    public function cellinedataset()
    {
    	return $this->belongsTo('App\Cellinedataset');
    }
    public function genesets()
    {
    	return $this->belongsTo('App\Geneset');
    }
}