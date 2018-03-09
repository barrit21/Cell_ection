<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Celline;

class CellinesFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fichier=file('./storage/Data/cell_lines.txt' , FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        unset($fichier[0]);
        unset($fichier[1]);

        foreach($fichier as $key){
            $infos = explode("\t", $key);
            $infos[0] =str_replace('"','',$infos[0]);
            $infos[2] = trim($infos[2]);
            $celline = Celline::firstOrCreate([
                'name' => $infos[0],
                'replicate' => $infos[2],
            ]);
        }
    }
}
