<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(RenterTypesTableSeeder::class);
         $this->call(ComplexesTableSeeder::class);
         $this->call(BillTypesTableSeeder::class);
         $this->call(CollectorsTableSeeder::class);
    }
}
