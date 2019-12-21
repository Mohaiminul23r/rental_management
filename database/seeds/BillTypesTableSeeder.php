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
            'name' => 'Commercial',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('bill_types')->insert([
            'id' => 2,
            'name' => 'General',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
