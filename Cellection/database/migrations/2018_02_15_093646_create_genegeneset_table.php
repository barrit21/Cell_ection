<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * CREATE MIGRATION/TABLE : php artisan make:migration create_genegeneset_table --create=genegeneset /on console/ 
 * 
 * Genegeneset table creation :
 *  - id_ genegeneset : unique id ;
 *  - id_genes : foreign key from genes table ;
 *  - id_geneset : foreign key from geneset table. 
 *   
 * FRESH the table : php artisan migrate:refresh /on console/
 */

class CreateGenegenesetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genegeneset', function (Blueprint $table) {
            $table->increments('id_genegeneset');
            $table->integer('id_genes')->unsigned()->unique();
            $table->integer('id_geneset')->unsigned()->unique();
            $table->timestamps();});
        Schema::enableForeignKeyConstraints();
        Schema::table('genegeneset', function(Blueprint $table){
            $table->foreign('id_genes')
                ->references('id_genes')->on('genes')
                ->onDelete('cascade');
            $table->foreign('id_geneset')
                ->references('id_geneset')->on('geneset')
                ->onDelete('cascade');});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genegeneset');
        //Schema::table('gene_geneset', function(Blueprint $table) {
          //  $table->dropForeign('gene_geneset_id_genes_foreign');
            //$table->dropColumn('id_genes');
            //$table->dropForeign('gene_geneset_id_geneset_foreign');
            //$table->dropColumn('id_geneset');});
    }
}
