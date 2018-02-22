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
        Schema::create('cellinedatasets', function (Blueprint $table) {
            $table->increments('id');
            $table->char('file',100);
            $table->integer('cellines_id')->unsigned();
            $table->foreign('cellines_id')->references('id')->on('cellines')->onDelete('cascade');
            $table->integer('datasets_id')->unsigned();
            $table->foreign('datasets_id')->references('id')->on('datasets')->onDelete('cascade');
            $table->integer('vanderbilts_id')->unsigned();
            $table->foreign('vanderbilts_id')->references('id')->on('vanderbilts')->onDelete('cascade');
            $table->integer('citbcmsts_id')->unsigned();
            $table->foreign('citbcmsts_id')->references('id')->on('citbcmsts')->onDelete('cascade');
            //$table->index(['id_cellines','id_datasets','id_vanderbilts','id_citbcmsts']);
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
        Schema::dropIfExists('cellinedatasets');
    }
}
