<?php

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use App\Celline;
use App\Dataset;
use Carbon\Carbon;

class CelDatasetLigneeFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $fichier = file('./storage/Data/cel_dataset_lignee.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        unset($fichier[0]);
        
        foreach ($fichier as $value) {
            $value = explode("\t",$value);
            $value[2] = trim($value[2]);

            $dataset = Dataset::firstOrCreate(['name' => $value[0]]);
            $celline = Celline::firstOrCreate([
                'name' => $value[2],
                'replicate' => 1
            ]);

            $filename = str_replace('-','.',$value[1]);

            $dataset -> cellines() -> attach($celline -> id, [
                'file' => $filename,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }

}
