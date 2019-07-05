<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->unsigned();            
            $table->string('employee_id',8)->nullable();
            $table->integer('role_id')->unsigned();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->timestamps();

            // $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        // Schema::dropIfExists('users');
        // Schema::table('users', function(Blueprint $table){
        // $table->dropForeign('users_department_id_foreign');
        // $table->dropForeign('users_role_id_foreign');
        // $table->dropColumn('department_id');
        // $table->dropColumn('role_id');
        // });
        
        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('users');
        //DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
