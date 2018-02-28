<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vanderbilt extends Model
{
    public function datasets()
    {
        return $this->belongsToMany('App\Dataset');
    }

    public function citbcmsts()
    {
        return $this->belongsToMany('App\Citbcmst');
    }

    public function cellines()
    {
        return $this->belongsToMany('App\Celline');
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
