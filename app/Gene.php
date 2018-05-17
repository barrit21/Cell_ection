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
    	$id_gene = $id;
        $pathways = DB::table('gene_geneset')
        ->join('genesets', 'gene_geneset.geneset_id', '=', 'genesets.id')
        ->select('genesets.name')
        ->where('gene_geneset.gene_id', $id_gene)
        ->get();

        //dd($pathways);
    	return $pathways;
    }

    public static function get_expressionlevel($id){
        $id_gene = $id;
        $expressionlevels = DB::table('expressionlevels')
        ->join('genes', 'expressionlevels.gene_symbol', 'LIKE', 'genes.hugo')
        ->join('cellines', 'cellines.id', '=', 'expressionlevels.celline_id')
        ->where('genes.id', $id_gene)
        ->get();

        //dd($expressionlevels);
        return($expressionlevels);
    }

    public static function get_genetitle($id){
        $id_gene = $id;
        $gene_title = DB::table('expressionlevels')
        ->join('genes', 'expressionlevels.gene_symbol', 'LIKE', 'genes.hugo')
        ->where('genes.id', $id_gene)
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
