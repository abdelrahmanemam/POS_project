<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run()
    {
        DB::table('categories')->insert([

            'name' => 'Uncategorized',
            'description' => 'Short Description For Uncategorized!'
        ]);
    }
}
