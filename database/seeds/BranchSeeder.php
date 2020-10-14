<?php

use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{

    public function run()
    {
        DB::table('branches')->insert([

            'name' => 'Main Branch',
            'address' => 'Villa 9, Street 5, Maadi Cairo',
            'status' => 1
        ]);
    }
}
