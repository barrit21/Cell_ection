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
        Schema::create('gene_genesets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('genes_id')->unsigned();
            $table->foreign('genes_id')
                ->references('id')->on('genes')
                ->onDelete('cascade');
            $table->integer('genesets_id')->unsigned();
            $table->foreign('genesets_id')
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
        Schema::dropIfExists('gene_genesets');
    }
}
