<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('product_id')->index('product_id');
            $table->integer('plan_id')->index('plan_id');

            $table->bigInteger('func_no_accounts')->default(5);
            $table->bigInteger('func_no_sms')->default(500);
            $table->bigInteger('func_no_records')->default(500000);
            $table->bigInteger('func_no_modules')->default(1);

            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('plan_id')->references('id')->on('plans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('features');
    }
}
