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
            $table->integer('gene_id')->unsigned()->nullable();
            $table->foreign('gene_id')->references('id')->on('genes')->onDelete('cascade');
            $table->integer('celline_dataset_id')->unsigned()->nullable();
            $table->foreign('celline_dataset_id')->references('id')->on('celline_dataset')->onDelete('cascade');
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