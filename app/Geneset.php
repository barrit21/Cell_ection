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

    public static function getES($id){
        $id_geneset=$id;
        $ES = DB::table('enrichementscores')
        ->join('genesets', 'enrichementscores.geneset_id', '=', 'genesets.id')
        ->join('cellines', 'enrichementscores.celline_id', '=', 'cellines.id')
        ->where('genesets.id', $id_geneset)
        ->get();
        //dd($ES);
        return $ES;       
    }

    public static function geneset_table(){
        $genesets=DB::table('genesets')->get();
        //dd($genesets);
        return $genesets;        
    }
}