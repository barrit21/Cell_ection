<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpressionlevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expressionlevels', function (Blueprint $table) {
            $table->increments('id');
            $table->double('expression',8,4);
            $table->integer('id_genes')->unsigned();
            $table->foreign('id_genes')->references('id')->on('genes')->onDelete('cascade');
            $table->integer('id_cellinedatasets')->unsigned();
            $table->foreign('id_cellinedatasets')->references('id')->on('cellinedatasets')->onDelete('cascade');
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
        Schema::dropIfExists('expressionlevels');
    }
}