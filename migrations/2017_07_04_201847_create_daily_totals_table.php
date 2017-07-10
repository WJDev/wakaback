<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyTotalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_totals', function (Blueprint $table) {
            $table->increments('id');
            $table->date('logdate');
            $table->integer('total_mins')->unsigned();
            $table->integer('total_hours')->unsigned();
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
        Schema::dropIfExists('daily_totals');
    }
}
