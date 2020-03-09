<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name', 191);
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->integer('role_id')->default(3)->index('role_id');
            $table->integer('organisation_id')->default(0)->index('organisation_id');
            $table->integer('status')->default(1);


            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();

            $table->string('image')->nullable();
            $table->string('phone')->nullable();


            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
