<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gene extends Model
{
    public function expressionlevels()
    {
    	return $this->hasMany('App\Expressionlevel');
    }

    public function genesets()
    {
    	return $this->belongsToMany('App\Geneset');
    }

    public static function liste_cell_dataset() 
    //Plus besoin de faire les jointures à la main après, y penser !
    {
    	$data = DB::table('genes')
            ->join('cellinedatasets', 'cellines.id', '=', 'cellinedatasets.cellines_id')
            ->join('datasets', 'datasets.id', '=', 'cellinedatasets.datasets_id')
            ->select('cellines.id','cellines.name', 'cellines.replicate', DB::raw('group_concat(datasets.name SEPARATOR ", ") as list_dataset'))
            ->groupBy('cellines.id')
            ->get();

    	return $data;
    }

}