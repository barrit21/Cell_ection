<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QueryController extends Controller
{
    public function index(Request $request)
    {
    	$term = $request->query('term');
    	//echo $term;
    	//exit;

    	//appel du modèle avec le $term pour récupérer les enregistrements correspondants.
    	//--> le modèle renvoie un tableau avec la liste des enregistrements

    	//transformer le tableau php en tableau json et l'envoyer à la vue DANS LE CONTROLLER ?
    	

    	return view('query');
    }
}
