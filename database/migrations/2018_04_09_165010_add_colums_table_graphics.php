<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsTableGraphics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('graphics', function (Blueprint $table) {
            $table->integer('myemployees_id')->unsigned();
            $table->foreign('myemployees_id')->references('id')->on('myemployees');
            $table->string('monthly_rate');
            $table->date('date');
            $table->string('from');
            $table->string('before');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('graphics', function (Blueprint $table) {
            $table->dropColumn(['myemployees_id', 'monthly_rate', 'date', 'from', 'before']);
        });
    }
}
