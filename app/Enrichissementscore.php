<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrichementscore extends Model
{
    public function cellinedataset()
    {
    	return $this->belongsTo('App\Cellinedataset');
    }
    public function genesets()
    {
    	return $this->belongsTo('App\Geneset');
    }
}