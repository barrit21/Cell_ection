<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Celline extends Model
{
    public function cellinedatasets()
    {
    	return $this->hasMany('App\Cellinedataset');
    }

    public function expressionlevels()
    {
    	return $this->hasManyThrough('App\Expressionlevel', 'App\Cellinedataset');
    }

     public function enrichementscores()
    {
    	return $this->hasManyThrough('App\enrichementscore','App\cellinedataset');
    }
}

