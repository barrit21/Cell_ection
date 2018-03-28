<?php

/**
 * @file Dataset.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @class Dataset
 */
class Dataset extends Model
{
    /**
     * @brief Create relations between models
     */
    public function cellines()
    {
        return $this -> belongsToMany('\App\Celline');
    }
    public function citbcmsts()
    {
        return $this->belongsToMany('App\Citbcmst', 'celline_dataset');
    }
    public function vanderbilts()
    {
        return $this->belongsToMany('App\Vanderbilt', 'celline_dataset');
    }
}