<?php

/**
 * @file 2018_02_21_124223_create_gene_geneset_table.php
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * @class CreateGeneGenesetTable
 */
class CreateGeneGenesetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gene_geneset', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gene_id')->unsigned();
            $table->foreign('gene_id')
                ->references('id')->on('genes')
                ->onDelete('cascade');
            $table->integer('geneset_id')->unsigned();
            $table->foreign('geneset_id')
                ->references('id')->on('genesets')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gene_geneset');
    }
}