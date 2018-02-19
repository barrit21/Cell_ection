<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * CREATE MIGRATION/TABLE : php artisan make:migration create_datasets_table --create=datasets /on console/ 
 * 
 * Datasets table creation :
 *  - id_datasets : unique id ;
 *  - name_datasets : dataset's name. 
 * 
 * FRESH the table : on console => php artisan migrate:refresh 
 */

class CreateDatasetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasets', function (Blueprint $table) {
            $table->increments('id_datasets');
            $table->string('name_datasets');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datasets');
    }
}
