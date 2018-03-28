<?php

/**
 * @file QueryController.php
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Celline;
use App\Gene;

/**
 * @class QueryController
 */
class QueryController extends Controller
{
    /**
     * Controller that allows to request on a page and get the informations
     *
     * @param      \Illuminate\Http\Request  $request  The request
     *
     * @return     array                     The answer of research
     */
    public function index(Request $request)
    {
        $term = $request->query('term');

        $searchH=[];

        $valuescells=Celline::where('name', 'LIKE', '%'.$term.'%')->get()->pluck('name')->take(5);
        foreach ($valuescells as $valuescell) {
            array_push($searchH, ["category"=>'Cell lines', "value"=>$valuescell]);
        }

        $valuesgenes=Gene::where('hugo', 'LIKE', '%'.$term.'%')->get()->pluck('hugo')->take(5);
        foreach ($valuesgenes as $valuesgene) {
            array_push($searchH, ["category"=>'Genes', "value"=>$valuesgene]);
        }

        return response()->json($searchH);
    }
}
