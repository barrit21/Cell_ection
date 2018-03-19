<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gene extends Model
{
    public function expressionlevels()
    {
    	return $this->hasMany('App\Expressionlevel');
    }

    public function genesets()
    {
    	return $this->belongsToMany('App\Geneset');
    }
}