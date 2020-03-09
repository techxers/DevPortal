<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
            array('name' => 'SuperAdmin', 'description' => 'Admin of the entire system'),
            array('name' => 'Admin', 'description' => 'Admin of a particular organisation'),
            array('name' => 'client-security', 'description' => 'Admin of a particular organisation'),
            array('name' => 'client-reception', 'description' => 'Admin of a particular organisation'),
        );
        DB::table('roles')->delete();
        DB::table('roles')->insert($roles);
    }

}
