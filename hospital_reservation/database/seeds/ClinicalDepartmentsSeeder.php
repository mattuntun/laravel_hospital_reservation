<?php

use Illuminate\Database\Seeder;

class ClinicalDepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\clinical_departments::class,5)->create();
    }
}
