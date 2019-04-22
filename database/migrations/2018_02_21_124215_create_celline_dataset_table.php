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
        Schema::dropIfExists('celline_dataset');
        Schema::create('celline_dataset', function (Blueprint $table) {
            $table->increments('idarray');
            $table->char('file',100)->unique();
            $table->integer('idcelline')->unsigned()->nullable();
            /*$table->foreign('idcelline')->references('idcelline')->on('cellines')->onDelete('cascade');*/
            $table->integer('iddataset')->unsigned()->nullable();
            /*$table->foreign('iddataset')->references('iddataset')->on('datasets')->onDelete('cascade');*/
            $table->char('subtype',45)->nullable();
            $table->double('correlation',25,20)->nullable();
            $table->double('pval',15,10)->nullable();
            $table->char('citbcmst',45)->nullable();
            $table->char('citbcmst_mixed',45)->nullable();
            $table->char('citbcmst_core',45)->nullable();
            $table->char('citbcmst_confidence',45)->nullable();
            //$table->integer('vanderbilt_id')->unsigned()->nullable();
            //$table->foreign('vanderbilt_id')->references('id')->on('vanderbilts')->onDelete('cascade');
            //$table->integer('citbcmst_id')->unsigned()->nullable();
            //$table->foreign('citbcmst_id')->references('id')->on('citbcmsts')->onDelete('cascade');
            //$table->integer('mean_cit')->nullable();
            //$table->integer('mean_vanderbilt')->nullable();
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
