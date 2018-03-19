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
        	
        	CellinesFileSeeder::class,
        	DatasetsFileSeeder::class,
        	CelDatasetLigneeFileSeeder::class,
            ResultFileSeeder::class,
            ExpressionLevelFileSeeder::class,
            UgoToUniprotFileSeeder::class,
        	#GeneSetFileSeeder::class,
        	#GseaResultFileSeeder::class
        	]);
        
    }
}
