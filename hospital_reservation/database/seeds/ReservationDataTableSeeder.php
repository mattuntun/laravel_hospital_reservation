<?php

use Illuminate\Database\Seeder;

class ReservationDataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Reservation_data::class,500)->create();
    }
}
