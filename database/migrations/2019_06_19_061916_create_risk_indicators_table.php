<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiskIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risk_indicators', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('risk_id')->unsigned();
            $table->string('name',1024)->nullable();
            $table->string('goal',1024)->nullable();
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
        //Schema::dropIfExists('risk_indicators');
        // Schema::create('risk_indicators', function (Blueprint $table) {
        // $table->dropForeign('risk_indicators_risk_id_foreign');
        
        // $table->dropColumn('risk_id');
        // });
       // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('risk_indicators');
       // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
