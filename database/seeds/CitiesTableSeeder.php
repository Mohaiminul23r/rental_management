<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'id' => 1,
            'country_id' => 1,
            'name' => 'Dhaka',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
