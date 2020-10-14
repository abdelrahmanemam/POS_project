<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CashierSeeder extends Seeder
{

    public function run()
    {
        DB::table('cashiers')->insert([

            'branch_id' => 1,
            'username' => 'test',
            'password' => Hash::make('password')
        ]);
    }
}
