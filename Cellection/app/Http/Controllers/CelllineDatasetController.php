<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CelllineDatasetController extends Controller
{
 public function index()
 {
 $categories = \App\Categorie::all();
 return view('frontend.categories',array('categories'=>$categories));
 }
 public function last()
 {
 $categorie = \App\Categorie::all()->last();
 return view('frontend.categories',array('categories'=>$categorie));
 }
 public function first()
 {
 $categorie = \App\Categorie::first();
 return view('frontend.categories',array('categories'=>$categorie));
 }
 public function create()
 {
 // méthode de création d'objets
 $categorie = \App\Categorie::create([
 'name'=>'categorie_'.mt_rand(0,200),
 ]);
 // autre méthode de création d'objets
 $new_cat = new \App\Categorie; // attention, il y a bien sur un NEW
 $new_cat->name = 'categorie_methode2_'.mt_rand(0,200);
 $new_cat->save();
 
 $categories = \App\Categorie::all();//retourne toutes les donnée
 return view('frontend.categories',array('categories'=>$categories));
 
 }
 public function find($categorieId)
 {
 $categories = \App\Categorie::where('name','like','%'.$categorieId.'%')->get()->first();
 return view('frontend.categories',array('categories'=>$categories));
 }
}
