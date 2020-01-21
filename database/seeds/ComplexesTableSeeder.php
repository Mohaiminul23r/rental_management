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
    	DB::table('complexes')->insert([
            'id' => 1,
            'name' => 'Complex-1',
            'complex_no' => 'V1-A',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('complexes')->insert([
            'id' => 2,
            'name' => 'Complex-2',
            'complex_no' => 'V2-B',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
