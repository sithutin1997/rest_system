<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'main',
        ]);
        DB::table('categories')->insert([
            'name' => 'dessert',
        ]);
        DB::table('categories')->insert([
            'name' => 'soup',
        ]);
    }
}
