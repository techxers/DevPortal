<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $services = array(
            array('title' => 'Smart Security Desk', 'period' => '3 Months', 'pricing' => '100000', 'details' => '
            Electronic booking of visits;
            Free end user android application;
            Verify visitor details government records;
            Broadcast SMS to visitors/customers;
            Generate reports'),
            array('title' => 'Smart Corporate Reception', 'period' => '6 Months', 'pricing' => '100000', 'details' => '
            
    Electronic booking of visits;
    Visitors Appointments Scheduling;
    Broadcast SMS to visitors/customers;
    Verify visitor details government records;
    Generate reports

'));

        DB::table('services')->delete();
        DB::table('services')->insert($services);
    }
}
