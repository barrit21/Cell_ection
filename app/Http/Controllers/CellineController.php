<?php

/**
 * @file CellineController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Celline;

/**
 * @class CellineController
 */
class CellineController extends Controller
{
	/**
	 * @brief Open the right page for the cell line
	 *
	 * @param      varchar  $name   The name
	 *
	 * @return     arrays  the name in the route or an error page
	 */
	public function index($name)
	{
		$celline = Celline::where('name',$name)->first();
		if($celline == null){
			return view("layout", ["menu"=>"home", "content" => view('error')]);
		}
		$idcelline= Celline::where('name',$name)->pluck('idcelline');
		$array=\DB::table('celline_dataset')->join('cellines','cellines.idcelline','=','celline_dataset.idcelline')->where('cellines.idcelline',$idcelline)->pluck('idarray');
		$data = Celline::liste_cell_datasets($celline -> idcelline);

		$genes_actives = Celline::genes_active($array);

		$gsea_results = Celline::get_gsea_results($celline -> idcelline);

		$nbpathways = Celline::get_nb_pathways();

		$validations = Celline::valide_results($celline -> idcelline);

		$pval1percent = Celline::fpval1percent($celline -> idcelline);

		$pval5percent = Celline::fpval5percent($celline -> idcelline);

		//comming soon = need data $data_gsea = Celline::gsea($celline -> id);
		return view("layout", ["menu" => "home", "content" => view('cell', array('cell'=> $celline, 'data'=> $data, 'data_classif'=>$data, 'genes_actives' => $genes_actives, 'gsea_results' => $gsea_results, 'nbpathways' => $nbpathways, 'validation'=>$validations, 'pval1percent' => $pval1percent, 'pval5percent' => $pval5percent))]);
	}

	public function show(){
		$cell_lines=Celline::celline_table();
		return view("admin.layoutadmin", ["contentadmin" => view('admin.celline_table', array('cell_lines'=> $cell_lines))]);
	}
}
