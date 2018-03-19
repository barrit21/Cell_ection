<?php

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use App\Celline;
use App\Dataset;

class CelDatasetLigneeFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $fichier=file('./storage/Data/cel_dataset_lignee.txt');
        unset($fichier[0]);

        
        
        foreach ($fichier as $value) {
            $value=explode("\t",$value);
            $value[2]=trim($value[2]);


            #$dataset= Dataset::firstOrNew(['name'=>$value[0]]);
            //$datasets= save();
            $dataset=Dataset::all();

            if ($dataset->contains('name', $value[0])===false){
                DB::table('datasets')->insert([
                    'name'=>($value[0]),
                    #'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }

            #$celline= Celline::firstOrNew(['name'=>$value[2]]);
            //$cellines=save();
            $celline=Celline::all();
            if ($celline->contains('name',$value[2])===false){
                DB::table('cellines')->insert([
                    'name'=>($value[2]),
                    #'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }

    
            $dataset=Dataset::where('name',$value[0])->first();
            $celline=Celline::where('name',$value[2])->first();
            $filename=$value[1];
            $filename=str_replace('-','.',$filename);

            

           
            $dataset -> cellines() -> attach($celline -> id, [
                'file' => $filename]);
            
            //$cellines -> datasets() -> attach($dataset-> id, [
              //  'file'=> $filename]);
              //  
        }
    }

}
