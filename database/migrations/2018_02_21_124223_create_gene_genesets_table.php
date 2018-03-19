<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;



class CreateGeneGenesetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gene_genesets', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->integer('id_genes')->unsigned();
            // $table->foreign('id_genes')->references('id')->on('genes')->onDelete('cascade');
            $table->integer('id_genesets')->unsigned();
            //$table->foreign('id_genesets')->references('id')->on('genesets')->onDelete('cascade');
            $table->timestamps();

        });

        Schema::enableForeignKeyConstraints();
        Schema::table('gene_genesets', function(Blueprint $table){
            $table->foreign('id_genes')
                ->references('id')->on('genes')
                ->onDelete('cascade');
            $table->foreign('id_genesets')
                ->references('id')->on('genesets')
                ->onDelete('cascade');});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::dropIfExists('gene_genesets');
    }
}