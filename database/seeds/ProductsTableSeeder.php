<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = array(
            array(
                "title" => "E-Reception",
                "description" => "E-Reception is a modern cloud based solution to register, track and manage your visitors. It offers the following features",
                "functionality" => "Register Walkin Visitors;
                                Register visitor appointments;
                                Send SMS notifications to visitor prior to their appointments dates;
                                Broadcast general messages to your list of visitors;
                                Ability to sort and search your visitor list;
                                Generate vistor reports baseds on a range of dates, daily, weekly and monthy;
                                Ability to see all messages sent by your organisation to your visitors;",
            ),
            array(
                "title" => "E-Security Desk",
                "description" => "E-Security Desk is a modern cloud based solution to register, track and manage your visitors. It offers the following features",
                "functionality" => "Register visitors at your security desk;
                                Quick registration of repeat visitor by using already recorded details to create new vist;
                                Register visitor assets;
                                Check In and Check out visitors;
                                Easily search visitors using date ranges, Id numbers,asset codes and name;
                                Generate visitor reports on weekly, monthly and yearly;",
            ));

        DB::table('products')->delete();
        DB::table('products')->insert($products);
    }
}