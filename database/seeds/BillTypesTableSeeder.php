<?php

use Illuminate\Database\Seeder;

class BillTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bill_types')->insert([
            'id' => 1,
            'name' => 'House Rent',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('bill_types')->insert([
            'id' => 2,
            'name' => 'Current Bill',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('bill_types')->insert([
            'id' => 3,
            'name' => 'Gas Bill',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('bill_types')->insert([
            'id' => 4,
            'name' => 'Water Bill',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('bill_types')->insert([
            'id' => 5,
            'name' => 'Internet Bill',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('bill_types')->insert([
            'id' => 6,
            'name' => 'Service Charge',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('bill_types')->insert([
            'id' => 7,
            'name' => 'Telephone Bill',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
