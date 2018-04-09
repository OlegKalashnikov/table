<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumsTabelgraphics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tabelgraphics', function (Blueprint $table) {
            $table->string('from')->nullable();
            $table->string('before')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tabelgraphics', function (Blueprint $table) {
            $table->dropColumn(['from', 'before']);
        });
    }
}
