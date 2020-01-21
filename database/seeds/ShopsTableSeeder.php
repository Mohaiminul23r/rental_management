<?php

use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('shops')->insert([
            'id' => 1,
            'name' => 'Shop-1',
            'complex_id' => 1,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

         DB::table('shops')->insert([
            'id' => 2,
            'name' => 'Shop-2',
            'complex_id' => 2,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
