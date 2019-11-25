<?php

use Illuminate\Database\Seeder;

class ClinicalDepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\clinical_department::class,30)->create();
    }
}
