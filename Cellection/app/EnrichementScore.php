<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EnrichementScore extends Model
{
    use Notifiable; 
 
 protected $table = 'enrichement_score';//nom de notre table
 protected $guarded = 'id_enrichementscore'; //non modifiable
}
