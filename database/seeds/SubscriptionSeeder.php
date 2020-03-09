<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subscription = array(
            array(
                'organisation_id' => 1,
                'products' => '1%2%',
                'plans' => "1%",
                'subscribed_on' => Carbon::now(),
                'amount_paid' => "100000"
        ));

        DB::table('subscriptions')->insert($subscription);
        factory(\App\Subscription::class,2)->create();
    }
}
