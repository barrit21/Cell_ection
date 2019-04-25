<?php

/**
 * @file 2018_02_21_124232_create_expressionlevels_table.php
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * @class CreateExpressionlevelsTable
 */
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
            $table->increments('idexpression');
            $table->integer('idgene')->unsigned()->nullable();
            $table->char('name')->nullable();
            $table->integer('idarray')->unsigned()->nullable();
            //$table->char('gene_symbol');
            //$table->char('gene_title');
            $table->float('expression');
            //$table->float('meanexp');
            //$table->float('sdexp')->nullable();
            $table->timestamps();
        });


        /*Schema::create('expressionlevels', function (Blueprint $table) {
            $table->increments('id');
            $table->double('expression',8,4);
            $table->integer('gene_id')->unsigned()->nullable();
            $table->foreign('gene_id')->references('id')->on('genes')->onDelete('cascade');
            $table->integer('celline_dataset_id')->unsigned()->nullable();
            $table->foreign('celline_dataset_id')->references('id')->on('celline_dataset')->onDelete('cascade');
            $table->timestamps();
        });*/
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
