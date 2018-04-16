<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGraphicothersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graphicothers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('month');
            $table->string('hours_per_day');
            $table->integer('number_of_working_days')->unsigned();
            $table->string('from');
            $table->string('before');
            $table->integer('rate')->unsigned();
            $table->date('date');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('myemployee_id')->unsigned();
            $table->foreign('myemployee_id')->references('id')->on('myemployees');
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
        Schema::dropIfExists('graphicothers');
    }
}
