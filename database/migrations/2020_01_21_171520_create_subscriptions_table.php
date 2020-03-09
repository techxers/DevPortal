<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subscriptions', function(Blueprint $table)
		{
			$table->bigIncrements('id');

			$table->integer('organisation_id')->index('organisation_id');
			$table->string('products');
            $table->string('plans');
			$table->dateTime('subscribed_on')->nullable();
			$table->bigInteger('amount_paid');
			$table->boolean('is_active')->default(true);

			$table->timestamps();

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
		Schema::drop('subscriptions');
	}

}
