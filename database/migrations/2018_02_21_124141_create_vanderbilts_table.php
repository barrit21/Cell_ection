<?php

/**
 * @file 2018_02_21_124141_create_vanderbilts_table.php
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * @class
 */
class CreateVanderbiltsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vanderbilts', function (Blueprint $table) {
            $table->increments('id');
            $table->char('class',45);
            $table->char('correlation',45)->nullable();
            $table->char('pval',45)->nullable();
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
        Schema::dropIfExists('vanderbilts');
    }
}