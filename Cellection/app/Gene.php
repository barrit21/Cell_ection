<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gene extends Model
{
    use Notifiable; 
 
 protected $table = 'genes';//nom de notre table
 protected $guarded = 'id_genes'; //non modifiable
}
