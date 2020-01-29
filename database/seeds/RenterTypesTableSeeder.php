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
            'name' => 'Family',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('renter_types')->insert([
            'id' => 2,
            'name' => 'Shop',
            'created_at' => now(),
            'updated_at' => now()
        ]);

         DB::table('renter_types')->insert([
            'id' => 3,
            'name' => 'Business Organization',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('renter_types')->insert([
            'id' => 4,
            'name' => 'Other',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
