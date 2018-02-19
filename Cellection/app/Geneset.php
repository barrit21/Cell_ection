<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geneset extends Model
{
  use Notifiable; 
 
 protected $table = 'geneset';//nom de notre table
 protected $guarded = 'id_geneset'; //non modifiable 
}
