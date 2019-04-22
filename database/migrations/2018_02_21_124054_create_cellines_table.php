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
            $table->increments('idcelline');
            $table->char('name',45);
            $table->integer('replicate')->nullable();
            $table->char('subtype',45)->nullable();
            $table->double('correlation',20,20)->nullable();
            $table->double('pval',10,10)->nullable();
            $table->char('citbcmst',45)->nullable();
            $table->char('citbcmst_mixed',45)->nullable();
            $table->char('citbcmst_core',45)->nullable();
            $table->char('citbcmst_confidence',45)->nullable();
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
        Schema::dropIfExists('cellines');
    }
}
