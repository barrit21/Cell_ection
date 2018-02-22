<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnrichementscoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrichementscores', function (Blueprint $table) {
            $table->increments('id');
            $table->double('pval',8,4);
            $table->double('padj',8,4);
            $table->double('es',8,4);
            $table->double('nes',8,4);
            $table->integer('moreextreme');
            $table->integer('cellinedatasets_id')->unsigned();
            $table->foreign('cellinedatasets_id')->references('id')->on('cellinedatasets')->onDelete('cascade');
            $table->integer('cellines_id')->unsigned();
            $table->foreign('cellines_id')->references('id')->on('cellines')->onDelete('cascade');
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
        Schema::dropIfExists('enrichementscores');
    }
}
