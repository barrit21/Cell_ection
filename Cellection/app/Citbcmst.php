<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citbcmst extends Model
{
   use Notifiable; 
 
 protected $table = 'citbcmst';//nom de notre table
 protected $guarded = 'id_citbcmst'; //non modifiable
}
