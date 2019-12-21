<?php

use Illuminate\Database\Seeder;

class ComplexesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('apartments')->insert([
            'id' => 1,
            'name' => 'Complex-1',
            'apartment_no' => 'V1-A',
            'description' => 'Complex-1 description',
            'rent_amount' => 2000,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('apartments')->insert([
            'id' => 2,
            'name' => 'Complex-2',
            'apartment_no' => 'V2-B',
            'description' => 'Complex-2 description',
            'rent_amount' => 1000,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
