<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiskFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risk_factors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('risk_id')->unsigned();
            $table->string('detail',1024)->nullable();
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
       // Schema::dropIfExists('risk_factors');
    //    Schema::create('risk_factors', function (Blueprint $table) {
    //    $table->dropForeign('risks_factors_risk_id_foreign');
        
    //    $table->dropColumn('risk_id');
    //    });
   // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    Schema::dropIfExists('risk_factors');
   // DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
