<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_langs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('logdate');
            $table->string('language', 10);
            $table->float('percent', 10, 2);
            $table->index('id');
            $table->index('logdate');
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
        Schema::dropIfExists('daily_langs');
    }
}
