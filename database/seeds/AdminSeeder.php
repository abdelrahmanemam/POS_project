<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{

    public function run()
    {
        DB::table('admins')->insert([

            'name' => 'Digital Veins',
            'username' => 'digital',
            'password' => Hash::make('password'),
            'permissions' => 1,
        ]);
    }
}
