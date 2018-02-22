<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expressionlevel extends Model
{
     public function cellinedatasets()
    {
    	return $this->belongsTo('App\Cellinedataset');
    }

    public function genes()
    {
    	return $this->belongsTo('App\Gene');
    }
}
