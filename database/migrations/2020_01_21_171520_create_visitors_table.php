<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
/*
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('organisation_id')->index('organisation_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone', 100)->nullable();
            $table->string('email')->nullable();
            $table->string('national_id', 100)->nullable();
            $table->string('comments')->nullable();
            $table->string('office', 100)->nullable();
            $table->string('host')->nullable();
            $table->string("visitor_state")->nullable();
            $table->dateTime("date_of_visit");
            $table->dateTime('time_in')->nullable();
            $table->dateTime('time_out')->nullable();
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
        Schema::drop('visitors');
    }

}
