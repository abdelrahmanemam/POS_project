<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BranchSeeder::class);
        $this->call(CashierSeeder::class);
    }
}
