<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * CREATE MIGRATION/TABLE : php artisan make:migration create_geneset_table --create=geneset /on console/ 
 * 
 * Geneset table creation :
 *  - id_ geneset : unique id ;
 *  - name_geneset : name of geneset.
 *   
 * FRESH the table : php artisan migrate:refresh /on console/
 */

class CreateGenesetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geneset', function (Blueprint $table) {
            $table->increments('id_geneset');
            $table->text('name_geneset');
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
        Schema::dropIfExists('geneset');
    }
}
