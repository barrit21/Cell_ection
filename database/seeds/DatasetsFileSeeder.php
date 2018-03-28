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
        $fichier=file('./storage/Data/datasets.txt',FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        unset($fichier[1]);
        unset($fichier[0]);

        foreach ($fichier as $line) {
            $line=str_replace('"', '', $line);
            $line=trim($line);
            DB::table('datasets')->insert([
                'name'=>($line),
            ]);
        }
    }
}