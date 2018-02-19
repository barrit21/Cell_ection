<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * CREATE MIGRATION/TABLE : php artisan make:migration create_expressionlevel_table --create=expressionlevel /on console/ 
 * 
 * Expressionlevel table creation :
 *  - id_ expressionlevel : unique id ;
 *  - id_genes : foreign key from genes table ;
 *  - id_celllinedataset : foreign key from geneset table;
 *  - expression : gene's expression.  
 *   
 * FRESH the table : php artisan migrate:refresh /on console/
 */

class CreateExpressionlevelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expressionlevel', function (Blueprint $table) {
            $table->increments('id_expressionlevel');
            $table->integer('id_genes')->unsigned()->unique();
            $table->integer('id_celllinedataset')->unsigned()->unique();
            $table->double('expression');
            $table->timestamps();});
        Schema::enableForeignKeyConstraints();
        Schema::table('expressionlevel', function(Blueprint $table){
            $table->foreign('id_genes')
                ->references('id_genes')->on('genes')
                ->onDelete('cascade');
            $table->foreign('id_celllinedataset')
                ->references('id_celllinedataset')->on('celllinedataset')
                ->onDelete('cascade');});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expressionlevel');
        //Schema::table('expression_level', function(Blueprint $table) {
          //  $table->dropForeign('expression_level_id_genes_foreign');
            //$table->dropColumn('id_genes');
            //$table->dropForeign('expressionlevel_id_celllinedataset_foreign');
            //$table->dropColumn('id_celllinedataset');});
    }
}
