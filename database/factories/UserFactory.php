<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(\App\Organisation::class, function (Faker $faker) {

    return [
        'name' => $faker->company,
        'email' => $faker->unique()->companyEmail,
        'postcode' => $faker->postcode,
        'phone' => $faker->phoneNumber,
        'city' => $faker->city,
        'country' => $faker->countryCode,
        'website' => $faker->url,
        'industry' => $faker->randomElement(["Fashion", "ICT", "Event", "More"]),
        'type' => $faker->randomElement(['Public', 'Self-Employed', 'Government', 'Non-Profit', 'Sole Proprietorship', "Privately", "Partnership"]),
        'subscript_status' => $faker->randomElement([0,1,2])
        ];

});
$factory->define(\App\Subscription::class, function (Faker $faker) {
    $orgCount = (new \App\Organisation())->count();

    return [

        'organisation_id' => \App\Organisation::find($faker->unique()->numberBetween(2,$orgCount))->id,
        'products' => ''.$faker->randomElement([1,2]).'',
        'plans' => "1",
        'subscribed_on' => Carbon::now(),
        'amount_paid' => $faker->randomElement([8000,8500,6000]),
    ];

});



$factory->define(\App\Visitor::class, function (Faker $faker) {
    $orgCount = (new \App\Organisation())->count();

    return [

        'organisation_id' => \App\Organisation::find(random_int(2, $orgCount))->id,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'national_id' => random_int(5000,5010),
        'comments' => $faker->sentence,
        'office'=> $faker->randomElement(['ICT Department', 'Business Department', 'HRM', 'Social Activities', 'Sales and Finance', "Marketing"]),
        'visitor_state'=> random_int(1,3),
        'host'=> $faker->randomElement(['CEO', 'Dpt Manager', 'Supervisor', 'Engineer', 'Pre-sales support', "Integration Specialist", "Sales Assistant"]),
        'time_in'=>date('Y-m-d-H:i:s'),
        'date_of_visit' => $faker->dateTime,
    ];
});




/*
 * $table->bigIncrements('id');
			$table->integer('organisation_id')->index('organisation_id');
			$table->integer('service_id')->index('service_id');
			$table->integer('subscription period')->nullable();
			$table->dateTime('subscribed_on')->nullable();
			$table->bigInteger('subscription_amount');
$factory->define(\App\Visitor::class, function (Faker $faker) {
    $orgCount = (new \App\Organisation())->count();
    return [

        'organisation_id' => \App\Organisation::find(random_int(1, $orgCount))->id,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->unique()->phoneNumber,
        'email' => $faker->unique()->email,
        'national_id' => $faker->bankAccountNumber,
        'comments' => $faker->sentence,
        'office'=> $faker->randomElement(['ICT Department', 'Business Department', 'HRM', 'Social Activities', 'Sales and Finance', "Marketing"]),
        'visit_status'=> $faker->randomElement([1,2,3]),
         'host'=> $faker->randomElement(['CEO', 'Dpt Manager', 'Supervisor', 'Engineer', 'Pre-sales support', "Integration Specialist", "Sales Assistant"]),
        'time_in'=>date('Y-m-d-H:i:s')
    ];
});

$factory->define(\App\Subscription::class, function (Faker $faker) {

    $orgCount = (new \App\Organisation())->count();
    return [

        'organisation_id' => \App\Organisation::find(random_int(1, $orgCount))->id,
        'service_id' => $faker->randomElement([1,2,3]),
        'subscription period' => $faker->randomElement([3,6,12]),
        'subscription_amount' => $faker->randomElement([45,100,500]),
    ];
});

*/