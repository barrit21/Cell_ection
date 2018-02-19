<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * CREATE MIGRATION/TABLE : php artisan make:migration create_vanderbild_table --create=vanderbild /on console/ 
 * 
 * Vanderbild table creation :
 *  - id_ vanderbild : unique id ;
 *  - class_vanderbild : a class in Vanderbild classification ;
 *  - score_vanderbild : vanderbild scoring.
 *   
 * FRESH the table : php artisan migrate:refresh /on console/
 */

class CreateVanderbildTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vanderbild', function (Blueprint $table) {
            $table->increments('id_vanderbild');
            $table->text('class_vanderbild');
            $table->integer('score_vanderbild');
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
        Schema::dropIfExists('vanderbild');
    }
}
