<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneGeneset extends Model
{
  use Notifiable; 
 
 protected $table = 'gene_geneset';//nom de notre table
 protected $guarded = 'id_genegeneset'; //non modifiable
}
