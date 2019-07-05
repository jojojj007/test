<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiskActivityResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risk_activity_results', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('risk_activity_id')->unsigned();
            $table->integer('ordinal')->unsigned()->nullable();
            $table->integer('risk_activity_status_id')->unsigned();
            $table->string('note',1024)->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();

            // $table->foreign('risk_activity_id')->references('id')->on('risk_activities')->onDelete('cascade');
            // $table->foreign('risk_activity_status_id')->references('id')->on('risk_activity_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('risk_activity_results');
        // Schema::create('risk_activity_results', function (Blueprint $table) {
        // $table->dropForeign('risk_activity_results_risk_activity_id_foreign');
        // $table->dropForeign('risk_activity_results_risk_activity_status_id_foreign');
        
        // $table->dropColumn('risk_activity_id');
        // $table->dropColumn('risk_activity_status_id');
        // });
       // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('risk_activity_results');
       // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
