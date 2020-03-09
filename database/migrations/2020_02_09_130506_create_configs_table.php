<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('theme')->default("light");





            $table->integer('user_id')->unsigned();

            $table->timestamps();


            $table->string('notify_message')->default("Hey %name, You have an appointment in %company on %date at %time");


            $table->integer('partner_id')->default(317);
            $table->string('api_key')->default('b7dcfad5cb3d4ef89c6f000f65065c2e');
                $table->string('short_code')->default('AFRINETSMS');

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
    }
}
