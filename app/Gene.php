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
        ->join('genesets', 'gene_geneset.idgeneset', '=', 'genesets.idgeneset')
        ->select('genesets.name')
        ->where('gene_geneset.idgene', $id_gene)
        ->get();

        //dd($pathways);
    	return $pathways;
    }

    public static function get_expressionlevel($id,$idgene){
        $expressionlevels=[];
        foreach($id as $id_gene){
          $expressionlevels[] = DB::table('celline_dataset')
          ->join('expressionlevels','expressionlevels.idarray','=','celline_dataset.idarray')
          ->join('cellines', 'cellines.idcelline', '=', 'celline_dataset.idcelline')
          ->where('celline_dataset.idarray', $id_gene)
            ->get();
        }
        //dd($expressionlevels);
        return($expressionlevels);
    }

    public static function get_genetitle($id){
        $id_gene = $id;
        $gene_title = DB::table('expressionlevels')
        ->join('genes', 'expressionlevels.name', 'LIKE', 'genes.hugo')
        ->where('genes.idgene', $id_gene)
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
