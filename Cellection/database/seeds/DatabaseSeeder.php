<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // GeneFileSeeder::class,
        	CelDatasetLigneeFileSeeder::class,
        	CellinesFileSeeder::class,
        	CitbcmstFileSeeder::class,
        	DatasetsFileSeeder::class,
        	UgoToUniprotFileSeeder::class,
        	ExpressionLevelFileSeeder::class,
        	GeneSetFileSeeder::class,
        	GseaResultFileSeeder::class,
            ResultFileSeeder::class,
        ]);
        
    }
}
