<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * CREATE MIGRATION/TABLE : php artisan make:migration create_cellines_table --create=cellines /on console/ 
 * 
 * Celllines table creation :
 *  - id_ cellines : unique id ;
 *  - name_datasets : celllines' name;
 *  - replicatenumber : number of replicate.
 *   
 * FRESH the table : on console => php artisan migrate:refresh 
 */

class CreateCelllinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celllines', function (Blueprint $table) {
            $table->increments('id_celllines');
            $table->string('name_celllines');
            $table->integer('replicatenumber');
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
        Schema::dropIfExists('celllines');
    }
}
