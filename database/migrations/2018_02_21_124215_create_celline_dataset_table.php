<?php

/**
 * @file 2018_02_21_124215_create_celline_dataset_table.php
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * @class CreateCellineDatasetTable
 */
class CreateCellineDatasetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celline_dataset', function (Blueprint $table) {
            $table->increments('id');
            $table->char('file',100)->unique();
            $table->integer('celline_id')->unsigned()->nullable();
            $table->foreign('celline_id')->references('id')->on('cellines')->onDelete('cascade');
            $table->integer('dataset_id')->unsigned()->nullable();
            $table->foreign('dataset_id')->references('id')->on('datasets')->onDelete('cascade');
            $table->integer('vanderbilt_id')->unsigned()->nullable();
            $table->foreign('vanderbilt_id')->references('id')->on('vanderbilts')->onDelete('cascade');
            $table->integer('citbcmst_id')->unsigned()->nullable();
            $table->foreign('citbcmst_id')->references('id')->on('citbcmsts')->onDelete('cascade');
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
        Schema::dropIfExists('celline_dataset');
    }
}