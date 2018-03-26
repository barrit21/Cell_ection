<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Celline extends Model
{
    protected $fillable=['name'];

    public function datasets()
    {
        return $this->belongsToMany('App\Dataset');
    }

    public function vanderbilts()
    {
        return $this->belongsToMany('App\Vanderbilt');
    }

    public function citbcmsts()
    {
        return $this->belongsToMany('App\Citbcmst');
    }

    public function expressionlevels()
    {
    	return $this->hasManyThrough('App\Expressionlevel', 'App\Celline_dataset');
    }

     public function enrichementscores()
    {
    	return $this->hasManyThrough('App\Enrichementscore','App\Celline_dataset');
    }
}

