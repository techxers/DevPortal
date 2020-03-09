<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $plans =
            array(
                array(
                    "product_id"=>1,
                    "title" => "Basic",
                    "pricing" => 6850,
                    "period" => "monthly",
                    "functionality" => "Maximum of 5 User accounts;
                                1 Free system admin account;
                                500 SMS notifications in a month;
                                A maximum of 500,000 customer records;
                                All reports;",
                    "note"=>null
                ),
                array(
                    "product_id"=>1,
                    "title" => "Standard",
                    "pricing" => 11800,
                    "period" => "monthly",
                    "functionality" => "Maximum of 15 User accounts;
                                1 Free system admin account;
                                1000 SMS notifications in a month;
                                A maximum of 1,500,000 customer records;
                                All reports;",
                    "note"=>null
                ),
                array(
                    "product_id"=>1,
                    "title" => "Enterprise",
                    "pricing" => 21550,
                    "period" => "monthly",
                    "functionality" => "Maximum of 100 User accounts;
                                1 Free system admin account;
                                5000 SMS notifications in a month;
                                A maximum of 500,000 customer records;
                                Organization with multiple receptions
                                All reports;",
                    "note" => "Extra functionality will be charged at 2% of the Basic"
                ),

                /******************module 2*****************/

                array(
                    "product_id"=>2,
                    "title" => "Basic",
                    "pricing" => 18000,
                    "period" => "monthly",
                    "functionality" => "Maximum of 5 User accounts;
                                1 Free system admin account;
                                A maximum of 500,000 customer records;
                                Free end user android mobile application on 5 devices;
                                A maximum of 5 E-Security desk;
                                All reports;",
                    "note"=>null
                ),
                array(
                    "product_id"=>2,
                    "title" => "Standard",
                    "pricing" => 25800,
                    "period" => "monthly",
                    "functionality" => "Maximum of 15 User accounts;
                    1           Free system admin account;
                                A maximum of 1,500,000 customer records;
                                Free end user android mobile application on 15 devices;
                                A maximum of 15 E-Security desk;
                                All reports;",
                    "note"=>null
                ),
                array(
                    "product_id"=>2,
                    "title" => "Enterprise",
                    "pricing" => 50550,
                    "period" => "monthly",
                    "functionality" => "Maximum of 100 User accounts;
                                1 Free system admin account;
                                A maximum of 5,000,000 customer records;
                                Free end user android mobile application on 100 devices;
                                A maximum of 100 E-Security desk;
                                All reports;",
                    "note" => "Extra functionality will be charged at 2% of the Basic"
                )
            );

        DB::table('plans')->delete();
        DB::table('plans')->insert($plans);

    }

}

