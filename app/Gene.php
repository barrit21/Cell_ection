<?php

/**
 * @file Gene.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Quotation;

/**
 * @class Gene
 */
class Gene extends Model
{
    /**
     * @brief Create relations between models
     */
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
    	/*$id_gene = $id;
        $pathways = DB::table('gene_geneset')
        ->where('gene_geneset.idgene', $id_gene)
        ->join('genesets', 'gene_geneset.idgeneset', '=', 'genesets.idgeneset')
        ->select('genesets.name')
        ->get();*/
        $query="(SELECT idgeneset FROM gene_geneset WHERE idgene=$id) as genegeneset";
        $pathways=DB::table('genesets')
        ->join(DB::raw($query), 'genegeneset.idgeneset','=','genesets.idgeneset')
        ->select('genesets.name')
        ->get();

        //dd($pathways);
    	return $pathways;
    }

    public static function get_expressionlevel($id){
        /*$expressionlevels=[];
        foreach($id as $id_gene){
          $expressionlevels[] = DB::table('celline_dataset')
          ->where('celline_dataset.idarray', $id_gene)
          ->join('expressionlevels','expressionlevels.idarray','=','celline_dataset.idarray')
          ->join('cellines', 'cellines.idcelline', '=', 'celline_dataset.idcelline')
            ->get();
        }
        //dd($expressionlevels);*/
        $query="(SELECT idcelline, expression_mean, expression_sd FROM expressionmean WHERE idgene=$id) as expressionmean";
        $expressionlevel=DB::table('cellines')
        ->join(DB::raw($query), 'expressionmean.idcelline','=','cellines.idcelline')
        ->select('cellines.name','expressionmean.expression_mean','expressionmean.expression_sd')
        ->get();
        return $expressionlevel;
    }

    public static function get_genetitle($id){
        $id_gene = $id;
        $gene_title = DB::table('expressionlevels')
        ->where('genes.idgene', $id_gene)
        ->join('genes', 'expressionlevels.name', 'LIKE', 'genes.hugo')
        ->first();

        //dd($gene_title);
        return($gene_title);
    }

    public static function gene_table(){
        $genes=DB::table('genes')->get();
        //dd($genes);
        return $genes;
    }
}
