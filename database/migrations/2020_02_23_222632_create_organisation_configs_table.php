<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisation_configs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('defaultNote')->default('both');
            $table->string('note_email')->nullable();
            $table->string('note_phone')->nullable();
            $table->string('note_email_cc')->nullable();


            $table->integer('organisation_id')->unsigned();
            $table->timestamps();
            $table->string('notify_message')->default("Hey %name, You have an appointment in %company on %date at %time");


            $table->integer('partner_id')->default(317);
            $table->string('api_key')->default('b7dcfad5cb3d4ef89c6f000f65065c2e');
            $table->string('short_code')->default('AFRINETSMS');

            $table->string('departments')->default('NA');
            $table->string('assets')->nullable();

            $table->foreign('organisation_id')->references('id')->on('organisations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organisation_configs');
    }
}
