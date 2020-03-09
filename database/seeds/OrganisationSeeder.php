<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrganisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organisation = array(
            array(
                'name' => "NeutronIT",
                "email" => "neutron@gmail.com",
                "postcode" => Str::random(10),
                'phone' => '+942-4585-3853',
                'city' => 'Nairobi',
                'country' => 'Kenya',
                'website' => 'http://127.0.0.1:8000/',
                'industry' => 'Computer / Network Security',
                'type' => 'Private',
                'image' => 'organisation/logo/neutron.svg')
        );

        DB::table('organisations')->insert($organisation);
        factory(\App\Organisation::class, 2)->create();
    }
}
