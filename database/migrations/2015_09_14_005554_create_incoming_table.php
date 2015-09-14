<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('metatype_id')->unsigned();
            $table->foreign('metatype_id')->references('id')->on('metatypes');
            $table->date('due_date')->nullable();
            $table->double('value', 15, 8);
            $table->date('receive_day')->nullable();
            $table->longText('description')->nullable();
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
        Schema::drop('incomings');
    }
}
