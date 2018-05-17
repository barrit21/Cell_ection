<?php

/**
 * @file DatasetsFileSeeder.php
 */

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Dataset;

/**
 * @class DatasetsFileSeeder
 */
class DatasetsFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file=file('./storage/Data/datasets.csv',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        unset($file[0]);

        foreach ($file as $value) {
            $value=explode(',',$value);
          
            DB::table('datasets')->insert([
                'name'=>$value[1],
            ]);
        }
    }
}