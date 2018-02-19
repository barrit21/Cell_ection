<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dataset extends Model
{
    use Notifiable; 
 
 protected $table = 'datasets';//nom de notre table
 protected $guarded = 'id_datasets'; //non modifiable


}
