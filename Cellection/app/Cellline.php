<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cellline extends Model
{
   use Notifiable; 
 
 protected $table = 'celllines';//nom de notre table
 protected $guarded = 'id_celllines'; //non modifiable
}
