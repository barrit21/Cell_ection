<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Quotation;

class Celline extends Model
{

    protected $fillable=['name'];

    public function datasets()
    {
        return $this->belongsToMany('App\Dataset');
    }

    public function vanderbilts()
    {
        return $this->belongsToMany('App\Vanderbilt');
    }

    public function citbcmsts()
    {
        return $this->belongsToMany('App\Citbcmst');
    }

    public function expressionlevels()
    {
        return $this->hasManyThrough('App\Expressionlevel', 'App\Celline_dataset');
    }

     public function enrichementscores()
    {
        return $this->hasManyThrough('App\Enrichementscore','App\Celline_dataset');
    }


    public static function liste_cell_dataset() 
    //Plus besoin de faire les jointures à la main après, y penser !
    {
    	$data = DB::table('cellines')
            ->join('celline_dataset', 'cellines.id', '=', 'celline_dataset.celline_id')
            ->join('datasets', 'datasets.id', '=', 'celline_dataset.dataset_id')
            ->select('cellines.id','cellines.name', 'cellines.replicate', DB::raw('group_concat(datasets.name SEPARATOR ", ") as list_dataset'))
            ->groupBy('cellines.id')
            ->get();

    	return $data;
    }

}

