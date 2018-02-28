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
            $table->integer('celline_dataset_id')->unsigned()->nullable();
            $table->foreign('celline_dataset_id')->references('id')->on('celline_dataset')->onDelete('cascade');
            $table->integer('celline_id')->unsigned()->nullable();
            $table->foreign('celline_id')->references('id')->on('cellines')->onDelete('cascade');
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
