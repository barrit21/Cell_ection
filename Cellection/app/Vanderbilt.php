<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vanderbilt extends Model
{
    public function datasets()
    {
        return $this->belongsToMany('App\Dataset', 'celline_dataset');
    }

    public function citbcmsts()
    {
        return $this->belongsToMany('App\Citbcmst', 'celline_dataset');
    }

    public function cellines()
    {
        return $this->belongsToMany('App\Celline', 'celline_dataset');
    }

    public function celline_datasets()
    {
        return $this->hasOne('App\CellineDataset');
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
