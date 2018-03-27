<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geneset extends Model
{
    public function genes()
    {
    	return $this->belongsToMany('App\Gene');
    }
    public function enrichementscores()
    {
    	return $this->hasMany('App\Enrichementscore');
    }
}