<?php

/**
 * @file 2018_02_21_124203_create_genesets_table.php
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * @class CreateGenesetsTable
 */
class CreateGenesetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genesets', function (Blueprint $table) {
            $table->increments('id');
            $table->char('name');
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
        Schema::dropIfExists('genesets');
    }
}