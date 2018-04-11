<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeabsencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeeabsences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('absence_id')->unsigned();
            $table->foreign('absence_id')->references('id')->on('absences');
            $table->integer('myemployee_id')->unsigned();
            $table->foreign('myemployee_id')->references('id')->on('myemployees');
            $table->date('from');
            $table->date('before');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employeeabsences');
    }
}
