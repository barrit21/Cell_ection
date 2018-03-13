<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Celline extends Model
{
    public function datasets()
    {
        return $this -> belongsToMany(\App\Dataset::class);
    }
}

