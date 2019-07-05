<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_years', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->unsigned();
            $table->integer('year_id')->unsigned();
            $table->integer('confirmed_by')->unsigned()->nullable();
            $table->dateTime('confirmed_at');
            $table->integer('approved_by')->unsigned()->nullable();
            $table->dateTime('approved_at');
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();

            // $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            // $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {     
        // Schema::table('department_years', function(Blueprint $table){
        // //Schema::dropIfExists('department_years');
        // $table->dropForeign('department_years_department_id_foreign');
        // $table->dropForeign('department_years_year_id_foreign');

        // $table->dropColumn('department_id');
        // $table->dropColumn('year_id');
        // });

        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('department_years');
        //DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
