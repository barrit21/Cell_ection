<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Quotation;

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

    public static function res_data_gene($id) 
    {
    	$id_gene = $id;
        $pathways = DB::table('gene_geneset')
        ->join('genesets', 'gene_geneset.geneset_id', '=', 'genesets.id')
        ->select('genesets.name')
        ->where('gene_geneset.gene_id', $id_gene)
        ->get();

        //dd($pathways);
    	return $pathways;
    }

}