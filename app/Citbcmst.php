<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citbcmst extends Model
{
   /** public function cellinedatasets()
    {
    	return $this->hasOne('App\Cellinedataset');

    }
    **/

    public function datasets()
    {
        return $this->belongsToMany('App\Dataset', 'celline_dataset');
    }

    public function cellines()
    {
        return $this->belongsToMany('App\Celline', 'celline_dataset');
    }

    public function vanderbilts()
    {
        return $this->belongsToMany('App\Vanderbilt', 'celline_dataset');
    }

    public function celline_dataset()
    {
        return $this->hasOne('App\CellineDataset');
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