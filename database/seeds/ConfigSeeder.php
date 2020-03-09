<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $config = array(
            array('user_id' => 1),
            array('user_id' => 2),
            array('user_id' => 3),

            array('user_id' => 4),

        );
        DB::table('configs')->delete();
        DB::table('configs')->insert($config);
    }
}
