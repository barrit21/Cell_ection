<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * CREATE MIGRATION/TABLE : php artisan make:migration create_citbcmst_table --create=citbcmst /on console/ 
 * 
 * Citbcmst table creation :
 *  - id_ citbcmst : unique id ;
 *  - class_citbcmst : a class in CITBCMST classification ;
 *  - score_citbcmst : CITBCMST scoring.
 *   
 * FRESH the table : php artisan migrate:refresh /on console/
 */

class CreateCitbcmstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citbcmst', function (Blueprint $table) {
            $table->increments('id_citbcmst');
            $table->text('class_citbcmst');
            $table->integer('score_citbcmst');
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
        Schema::dropIfExists('citbcmst');
    }
}
