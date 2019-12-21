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
            'description' => 'Description of Shop-1',
            'rent_amount' => 1500,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

         DB::table('shops')->insert([
            'id' => 2,
            'name' => 'Shop-2',
            'description' => 'Description of Shop-2',
            'rent_amount' => 2000,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
