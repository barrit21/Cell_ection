<?php

/**
 * @file DatabaseSeeder.php
 */

use Illuminate\Database\Seeder;

/**
 * @class DatabaseSeeder
 */

class DatabaseSeeder extends Seeder
{
    /**
     * @brief Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CellinesFileSeeder::class,
            DatasetsFileSeeder::class,
            GenesFileSeeder::class,
            GeneSetFileSeeder::class,
            GeneGenesetSeeder::class,
            CelDatasetLigneeFileSeeder::class,
            //CitbcmstFileSeeder::class,
            //ResultFileSeeder::class,
            ExpressionLevelFileSeeder::class,
            GseaResultFileSeeder::class
            ]);
    }
}
