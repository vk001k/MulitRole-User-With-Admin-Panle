<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '3',
            'fname' => 'Admin',
            'lname' =>'1',
            'email' => 'admin@yopmail.com',
            'reg_by' => 'Web',
            'password' => Hash::make('123456789'),
            'address' =>'',
            'google_id' =>'',
            'facebook_id' =>'',
        ]);
    }
}
