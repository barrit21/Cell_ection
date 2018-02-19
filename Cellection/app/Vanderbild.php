<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vanderbild extends Model
{
   use Notifiable; 
 
 protected $table = 'vanderbild';//nom de notre table
 protected $guarded = 'id_vanderbild'; //non modifiable 
}
