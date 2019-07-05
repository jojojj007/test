<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiskActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risk_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('risk_id')->unsigned();
            $table->string('name',1024)->nullable();
            $table->integer('risk_activity_status_id')->unsigned();
            $table->string('deadline',512)->nullable();
            $table->string('oic',512)->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();

            // $table->foreign('risk_id')->references('id')->on('risks')->onDelete('cascade');
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
        //Schema::dropIfExists('risk_activities');
        // Schema::create('risk_activities', function (Blueprint $table) {
        // $table->dropForeign('risk_activities_risk_id_foreign');
        // $table->dropForeign('risk_activities_risk_activity_status_id_foreign');
        
        // $table->dropColumn('risk_id');
        // $table->dropColumn('risk_activity_status_id');
        // });
       // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('risk_activities');
       // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
