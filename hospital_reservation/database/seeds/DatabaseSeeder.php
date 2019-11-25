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
        // $this->call(UsersTableSeeder::class);
        $this->call([PtDataTableseeder::class]); 
        $this->call([ReservationDataTableSeeder::class]);
        $this->call([ClinicalDepartmentSeeder::class]);       
    }
}
