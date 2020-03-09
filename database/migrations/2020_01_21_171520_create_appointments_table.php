<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('organisation_id')->index('organisation_id');
            $table->integer('visitor_id')->index('visitor_id');
            $table->dateTime('dateTime');
            $table->string('status')->default("pending");
            $table->boolean("notified")->default(false);
            $table->string('comments')->default("not specified");
            /***since when a visitor returns we will have to duplicate his/her data in the visitors table,
             * we can't really on the id alone to track the visitors appointment, we will need a column for
             * the national id of the visitor in the appointments table*/
            $table->string('national_id', 100)->nullable();
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
        Schema::drop('appointments');
    }

}
