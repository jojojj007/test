<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiskIndicatorResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risk_indicator_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('risk_indicator_id')->unsigned();
            $table->integer('ordinal')->unsigned()->nullable();
            $table->string('result',1024)->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();

            // $table->foreign('risk_indicator_id')->references('id')->on('risk_indicators')->onDelete('cascade');
        //    $table->foreign('ordinal')->references('ordinal')->on('risk_results')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('risk_indicator_results');
        // Schema::create('risk_indicator_results', function (Blueprint $table) {
        // $table->dropForeign('risk_indicator_results_risk_indicator_id_foreign');
        
        // $table->dropColumn('risk_indicator_id');
        // });
       // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('risk_indicator_results');
       // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
