<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * CREATE MIGRATION/TABLE : php artisan make:migration create_genes_table --create=genes /on console/
 * 
 * Genes table creation :
 *  - id_genes : unique id ;
 *  - name_genes : gene's name;
 *  - info_gene : complementary informations about the gene.  
 * 
 * FRESH the table : on console => php artisan migrate:refresh 
 */

class CreateGenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genes', function (Blueprint $table) {
            $table->increments('id_genes');
            $table->text('name_genes');
            $table->integer('info_genes')->nullable($value = true);
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
        Schema::dropIfExists('genes');
    }
}
