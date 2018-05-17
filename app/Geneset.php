<?php

/**
 * @file Geneset.php
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * @class
 */
class Geneset extends Model
{
	/**
	 * @brief Create relations between models
	 */
    public function genes()
    {
    	return $this->belongsToMany('App\Gene');
    }
    public function enrichementscores()
    {
    	return $this->hasMany('App\Enrichementscore');
    }

    public static function get_genes($id){
        $id_geneset=$id;
        $genes=DB::table('gene_geneset')
        ->join('genes', 'gene_geneset.gene_id', '=', 'genes.id')
        ->join('expressionlevels', 'genes.hugo', '=', 'expressionlevels.name')
        ->where('gene_geneset.geneset_id', $id_geneset)
        ->select( DB::raw('DISTINCT(genes.hugo)'), 'expressionlevels.gene_title', 'genes.entrez')
        ->get();

        //dd($genes);
        return $genes;
    }

    public static function geneset_table(){
        $genesets=DB::table('genesets')->get();
        //dd($genesets);
        return $genesets;        
    }
}