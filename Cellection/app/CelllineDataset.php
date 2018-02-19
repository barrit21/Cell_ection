<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CelllineDataset extends Model
{
   use Notifiable; 
 
 protected $table = 'cellline_dataset';//nom de notre table
 protected $guarded = 'id_celllinedataset'; //non modifiable
}
