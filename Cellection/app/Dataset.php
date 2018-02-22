<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    public function cellinedatasets()
    {
    	return $this->hasOne('App\Cellinedataset');
    }

    public function expressionlevels()
    {
    	return $this->hasManyThrough('App\Expressionlevel', 'App\Cellinedataset');
    }

     public function enrichementscores()
    {
    	return $this->hasManyThrough('App\Enrichementscore','App\Cellinedataset');
    }
}
