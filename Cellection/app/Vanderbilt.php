<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vanderbilt extends Model
{
    public function cellinedatasets()
    {
    	return $this->hasOne('App\Cellinedataset');
    	#$test1= ...

    }

    public function expressionlevels()
    {
    	return $this->hasManyThrough('app\Expressionlevel', 'App\Cellinedataset');
    }

     public function enrichementscores()
    {
    	return $this->hasManyThrough('app\Enrichementscore','App\Cellinedataset');
    }
}
