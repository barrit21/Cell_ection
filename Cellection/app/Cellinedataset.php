<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cellinedataset extends Model
{
    public function vanderbilts()
    {
    	return $this->belongsTo('App\Vanderbilt');
    }

    public function citbcmsts()
    {
    	return $this->belongsTo('App\Citbcmst');
    }

    public function datasets()
    {
    	return $this->belongsTo('App\Dataset');
    }

    public function cellines()
    {
    	return $this->belongsTo('App\Celline');
    }

    public function expressionlevels()
    {
    	return $this->belongsTo('App\Expressionlevel');
    }

    public function enrichementscores()
    {
    	return $this->belongsTo('App\Enrichementscore');
    }


}
