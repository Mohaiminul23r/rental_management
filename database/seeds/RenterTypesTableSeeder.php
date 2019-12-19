<?php

use Illuminate\Database\Seeder;

class RenterTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('renter_types')->insert([
            'id' => 1,
            'name' => 'Commercial',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('renter_types')->insert([
            'id' => 2,
            'name' => 'General',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
