<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Quotation;
use App\Celline;
use App\Cellinedataset;
use App\Dataset;

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


    /*public static function liste_cell_dataset() 
    {
    	$data = DB::table('cellines')
            ->join('celline_dataset', 'cellines.id', '=', 'celline_dataset.celline_id')
            ->join('datasets', 'datasets.id', '=', 'celline_dataset.dataset_id')
            ->select('cellines.id','cellines.name', 'cellines.replicate', DB::raw('group_concat(datasets.name SEPARATOR ", ") as list_dataset'))
            ->groupBy('cellines.id')
            ->get();

    	return $data;
    }*/

    public static function res_data($id)
    {
        $id_cell = $id;
        $id_dataset = CellineDataset::where('celline_id', $id_cell) -> pluck('dataset_id');


        $resultats=[];

        foreach ($id_dataset as $cell)
        {
            $resu = Dataset::where('id', $cell) -> pluck('name');
            array_push($resultats, $resu);
        }
        //dd($resultats);
        return $resultats;
    }

    /*public static function id_files($id)
    {
        $id_cell = $id;
        $id_file = CellineDataset::where('celline_id', $id_cell) -> pluck('id');

        return $id_file;
    }*/

}