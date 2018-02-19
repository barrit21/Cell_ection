<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * CREATE MIGRATION/TABLE : php artisan make:migration create_celllinedataset_table --create=celllinedataset /on console/ 
 * 
 * Celllinedataset table creation :
 *  - id_ celllinedataset : unique id ;
 *  - id_celllines : foreign key from celllines table ;
 *  - id_datasets : foreign key from datasets ; 
 *  - id_vanderbild : foreign key from vanderbild table ;
 *  - id_citbcmst : foreign key from citbcmst table ; 
 *   
 * FRESH the table : php artisan migrate:refresh /on console/
 */

class CreateCelllinedatasetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('celllinedataset', function (Blueprint $table) {
            $table->increments('id_celllinedataset');
            $table->integer('id_celllines')->unsigned();
            $table->integer('id_datasets')->unsigned();
            $table->integer('id_vanderbild')->unsigned();   
            $table->integer('id_citbcmst')->unsigned();
            $table->timestamps();});
        Schema::enableForeignKeyConstraints();
        Schema::table('celllinedataset', function(Blueprint $table){
            $table->foreign('id_celllines')
                ->references('id_celllines')->on('celllines')
                ->onDelete('cascade');
            $table->foreign('id_datasets')
                ->references('id_datasets')->on('datasets')
                ->onDelete('cascade');
            $table->foreign('id_vanderbild')
                ->references('id_vanderbild')->on('vanderbild')
                ->onDelete('cascade');
            $table->foreign('id_citbcmst')
                ->references('id_citbcmst')->on('citbcmst')
                ->onDelete('cascade');});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('celllinedataset');
       // Schema::table('cellline_dataset', function(Blueprint $table) {
         //   $table->dropForeign('cellline_dataset_id_cellines_foreign');
           // $table->dropColumn('id_celllines');
            //$table->dropForeign('cellline_dataset_id_datasets_foreign');
            //$table->dropColumn('id_datasets');
            //$table->dropForeign('cellline_dataset_id_vanderbild_foreign');
            //$table->dropColumn('id_vanderbild');
            //$table->dropForeign('cellline_dataset_id_citbcmst_foreign');
            //$table->dropColumn('id_citbcmst');});
    }
}
