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
        $query="(SELECT idgene FROM gene_geneset WHERE idgeneset=$id_geneset) as genegeneset";
        $genes=DB::table('genes')
        ->join(DB::raw($query), 'genegeneset.idgene', '=', 'genes.idgene')
        ->select('genes.hugo','genes.entrez')
        ->get();

        //dd($genes);
        return $genes;
    }

    public static function getES($id){
        $id_geneset=$id;
        $query="(SELECT idcelline,size,ES,NES,pval,nMoreExtreme FROM enrichementscores WHERE idgeneset=$id_geneset) as gsea";
        $ES = DB::table('cellines')
        ->join(DB::raw($query), 'gsea.idcelline', '=', 'cellines.idcelline')
        ->select('cellines.name','gsea.size','gsea.ES','gsea.NES','gsea.pval','gsea.nMoreExtreme')
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
