<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpressionMean extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expressionmean', function (Blueprint $table){
          $table->increments('idexpmean');
          $table->integer('idgene')->index();
          $table->integer('idcelline')->index();
          $table->double('expression_mean',25,20)->nullable();
          $table->double('expression_sd',25,20)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
