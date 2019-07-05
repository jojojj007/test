<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiskResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risk_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('risk_id')->unsigned();
            $table->integer('ordinal')->unsigned()->nullable();
            $table->integer('likelihood')->unsigned()->nullable();
            $table->integer('impact')->unsigned()->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();

            // $table->foreign('risk_id')->references('id')->on('risks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {      
        //Schema::dropIfExists('risk_results');
        // Schema::create('risk_results', function (Blueprint $table) {
        // $table->dropForeign('risk_results_risk_id_foreign');

        // $table->dropColumn('risk_id');
        // });
       // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('risk_results');
       // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
