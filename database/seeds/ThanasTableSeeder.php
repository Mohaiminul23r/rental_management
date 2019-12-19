<?php

use Illuminate\Database\Seeder;

class ThanasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('thanas')->insert([
            'id' => 1,
            'city_id' => 1,
            'name' => 'Vatara',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
