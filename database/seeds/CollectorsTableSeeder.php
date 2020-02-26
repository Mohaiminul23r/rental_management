<?php

use Illuminate\Database\Seeder;

class CollectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('collectors')->insert([
            'id' => 1,
            'collectorID' => '',
            'collector_name' => 'Collector-1',
            'father_name' => 'Collector-1 Father',
            'mother_name' => 'Collector-1 Mother',
            'email' => 'collector@gmail.com',
            'contact_no' => '01855000111',
            'nid_no' => '100200500',
            'date_of_birth' => '2020-02-20',
            'present_address' => 'Dhaka',
            'permanent_address' => 'Jashore',
            'gender' => 'Male',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
