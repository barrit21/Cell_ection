<?php

/**
 * @file 2018_02_21_124054_create_cellines_table.php
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * @class CreateCellinesTable
 */
class CreateCellinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cellines', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name',45);
            $table->integer('replicate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cellines');
    }
}