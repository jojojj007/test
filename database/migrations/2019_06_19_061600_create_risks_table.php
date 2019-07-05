<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRisksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_year_id')->unsigned();
            $table->string('name',512)->nullable();
            $table->integer('risk_type_id')->unsigned();
            $table->integer('likelihood')->unsigned()->nullable();
            $table->integer('risk_impact_id')->unsigned();
            $table->integer('impact')->unsigned()->nullable();
            $table->integer('risk_strategy_id')->unsigned();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();

            // $table->foreign('department_year_id')->references('id')->on('department_years')->onDelete('cascade');
            // $table->foreign('risk_type_id')->references('id')->on('risk_types')->onDelete('cascade');
            // $table->foreign('risk_impact_id')->references('id')->on('risk_impacts')->onDelete('cascade');
            // $table->foreign('risk_strategy_id')->references('id')->on('risk_strategies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {        
        //Schema::dropIfExists('risks');
        // Schema::create('risks', function (Blueprint $table) {
        // $table->dropForeign('risks_department_year_id_foreign');
        // $table->dropForeign('risks_risk_type_id_foreign');
        // $table->dropForeign('risks_risk_impact_id_foreign');
        // $table->dropForeign('risks_risk_strategy_id_foreign');

        // $table->dropColumn('department_year_id');
        // $table->dropColumn('risk_type_id');
        // $table->dropColumn('risk_impact_id');
        // $table->dropColumn('risk_strategy_id');
        // });

        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('risks');
        //DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
