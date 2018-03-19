<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCellineDatasetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celline_datasets', function (Blueprint $table) {
            $table->increments('id');
            $table->char('file',100);
            $table->integer('id_cellines')->unsigned();
            $table->foreign('id_cellines')->references('id')->on('cellines')->onDelete('cascade');
            $table->integer('id_datasets')->unsigned();
            $table->foreign('id_datasets')->references('id')->on('datasets')->onDelete('cascade');
            $table->integer('id_vanderbilts')->unsigned();
            $table->foreign('id_vanderbilts')->references('id')->on('vanderbilts')->onDelete('cascade');
            $table->integer('id_citbcmsts')->unsigned();
            $table->foreign('id_citbcmsts')->references('id')->on('citbcmsts')->onDelete('cascade');
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
        Schema::dropIfExists('celline_datasets');
    }
}