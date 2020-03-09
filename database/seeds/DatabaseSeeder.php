<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(OrganisationSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(VisitorsTableSeeder::class);
        $this->call(SubscriptionSeeder::class);
        $this->call(ConfigSeeder::class);
        $this->call(IndustryTypesSeeder::class);
        $this->call(OrganisationConfigsTableSeeder::class);

        $this->call(ProductsTableSeeder::class);
        $this->call(PlansTableSeeder::class);
        $this->call(FeaturesTableSeeder::class);
    }
}
