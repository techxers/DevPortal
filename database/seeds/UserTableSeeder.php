<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array('name' => "Collins Kemboi", "email" => "collins@gmail.com", "password" => bcrypt("collins"), 'role_id' => 1, 'organisation_id' => 1, 'status' => 1,'email_verified_at'=>'2020-02-20 16:22:09',"created_at"=>"2020-02-20 16:22:09"),
            array('name' => "Frankline Sable", "email" => "frankline@gmail.com", "password" => bcrypt("frankline"), 'role_id' => 2, 'organisation_id' => 2, 'status' => 1,'email_verified_at'=>'2020-02-20 16:22:09',"created_at"=>"2020-02-20 16:22:09"),
            array('name' => "Grishon Gikima", "email" => "grishon@gmail.com", "password" => bcrypt("grishon"), 'role_id' => 3, 'organisation_id' => 2, 'status' => 1,'email_verified_at'=>'2020-02-20 16:22:09',"created_at"=>"2020-02-20 16:22:09"),
            array('name' => "Ian Odundo", "email" => "ian@gmail.com", "password" => Hash::make("ian123"), 'role_id' => 2, 'organisation_id' => 3, 'status' => 1,'email_verified_at'=>'2020-02-20 16:22:09',"created_at"=>"2020-02-20 16:22:09")

        );

        DB::table('users')->delete();
        DB::table('users')->insert($users);
    }
}

