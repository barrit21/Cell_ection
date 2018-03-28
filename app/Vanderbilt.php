<?php

/**
 * @file Vanderbilt.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @class Vanderbilt
 */
class Vanderbilt extends Model
{
    /**
     * @brief Create relations between models
     */
    public function datasets()
    {
        return $this->belongsToMany('App\Dataset', 'CellineDataset');
    }
    public function citbcmsts()
    {
        return $this->belongsToMany('App\Citbcmst', 'CellineDataset');
    }
    public function cellines()
    {
        return $this->belongsToMany('App\Celline', 'CellineDataset');
    }
    public function celline_dataset()
    {
        return $this->hasOne('App\CellineDataset');
    }
    public function expressionlevels()
    {
        return $this->hasManyThrough('app\Expressionlevel', 'App\CellineDataset');
    }
     public function enrichementscores()
    {
        return $this->hasManyThrough('app\Enrichementscore','App\CellineDataset');
    }
}