<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpressionLevel extends Model
{
    use Notifiable; 
 
 protected $table = 'expression_level';//nom de notre table
 protected $guarded = 'id_expressionlevel'; //non modifiable
}
