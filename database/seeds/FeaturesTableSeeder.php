<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $features =
            array(
                array(
                    "product_id"=>1,
                    "plan_id"=>1,
                ),
                array(
                    "product_id"=>1,
                    "plan_id"=>2,
                ),
                array(
                    "product_id"=>1,
                    "plan_id"=>3,
                ),
                /******************module 2*****************/

                array(
                    "product_id"=>2,
                    "plan_id"=>4,
                ),
                array(
                    "product_id"=>2,
                    "plan_id"=>5,
                ),
                array(
                    "product_id"=>2,
                    "plan_id"=>6,
                )

            );

        DB::table('features')->delete();
        DB::table('features')->insert($features);
    }
}
