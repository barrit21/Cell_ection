<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrichementscore extends Model
{
    public function callinedatasets()
    {
    	return $this->belongsTo('App\Cellinedataset');
    }
}
