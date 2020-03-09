<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisations', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name',191);
            $table->string('email',191);
            $table->string('postcode',191)->nullable();
            $table->string('phone',191);
            $table->string('city',191);
            $table->string('country',191);
            $table->string('website',191)->nullable();
            $table->string('industry',191)->nullable();
            $table->string('type',191);
            $table->string('image')->nullable();
            $table->string('subscript_status')->default(2);
            $table->boolean('access_status')->default(true);
            $table->text("disable_reason")->nullable();
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
        Schema::dropIfExists('organisations');
    }
}
