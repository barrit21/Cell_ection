<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * CREATE MIGRATION/TABLE : php artisan make:migration create_enrichementscore_table --create=enrichementscore /on console/ 
 * 
 * enrichementscore table creation :
 *  - id_enrichementscore : unique id ;
 *  - id_celllinedatatset : foreign key from celllinedataset table ;
 *  - id_celllines : foreign key from celllines table. 
 *   
 * FRESH the table : php artisan migrate:refresh /on console/
 */

class CreateEnrichementscoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enrichementscore', function (Blueprint $table) {
            $table->increments('id_enrichementscore');
            $table->integer('id_celllinedataset')->unsigned()->unique();
            $table->integer('id_celllines')->unsigned()->unique();
            $table->timestamps();});
        Schema::enableForeignKeyConstraints();
        Schema::table('enrichementscore', function(Blueprint $table){
            $table->foreign('id_celllinedataset')
                ->references('id_celllinedataset')->on('celllinedataset')
                ->onDelete('cascade');
            $table->foreign('id_celllines')
                ->references('id_celllines')->on('celllines')
                ->onDelete('cascade');});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enrichementscore');
        //Schema::table('enrichement_score', function(Blueprint $table) {
          //  $table->dropForeign('enrichement_score_id_celllinedataset_foreign');
            //$table->dropColumn('id_celllinedataset');
            //$table->dropForeign('enrichement_score_id_celllines_foreign');
            //$table->dropColumn('id_celllines');});
    }
}
