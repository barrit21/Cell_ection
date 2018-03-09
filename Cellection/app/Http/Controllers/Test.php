<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Celline;
use App\Dataset;
use App\Vanderbilt;
use App\Citbcmst;
use App\CellineDataset;

class Test extends Controller
{
    public function test()
    {
        $celline = Celline::first();
        $dataset = Dataset::first();
        dd($celline, $dataset);
        
        $vanderbilt=Vanderbilt::where([
                ['class','BL2'],
                ['correlation','0.233792'],
                ['pval','0.005'],
        ])->first();

        $cellinedataset=CellineDataset::where('file','BT.20_SS331465_HG.U133_Plus_2_HCHP.182965_.CEL')->first();
        dd($cellinedataset);
        $vanderbilt -> celline_datasets() ->save($cellinedataset, 'vanderbilt_id');
    }

}
