<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<6 ; $i++)
        {
            DB::table('tables')->insert([
                'table_number' => $i,
               
            ]);

        }
        
    }
}
