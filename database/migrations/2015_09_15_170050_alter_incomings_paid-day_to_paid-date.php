<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterIncomingsPaidDayToPaidDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incomings', function ($table) {
            $table->renameColumn('receive_day', 'receive_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('incomings', function ($table) {
            $table->renameColumn('receive_date', 'receive_day');
        });
    }
}
