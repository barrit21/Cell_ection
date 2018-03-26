<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->double('correlation',8,6)->nullable();
            $table->double('pval',8,4)->nullable();
            #$table->timestamps();
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