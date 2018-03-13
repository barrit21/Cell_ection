<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Celline;
use \App\Dataset;

class TestRelations extends Controller
{
    public function test()
    {
        $dataset = Dataset::where('name','Krupp13')->first();
        dd($dataset);
    }
}
