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
        DB::table('reservation_data')->insert([
            [ 'reservation_date'=>'20220101',
            'reservation_time'=>'09:00:00', 
            'reservation_department'=>'サンプル内科', 
            'pt_id'=>'111',
            'letter_of_introduction'=>'1',
            'introduction_hp'=>'サンプル病院',
            'introduction_hp_tell'=>'000-0000-0000',
            'introduction_hp_date'=>'20211231',],
         ]);
         DB::table('reservation_data')->insert([
            [ 'reservation_date'=>'20220101',
            'reservation_time'=>'10:00:00', 
            'reservation_department'=>'サンプル内科', 
            'pt_id'=>'111',
            'letter_of_introduction'=>'2',]
         ]);
        factory(App\Reservation_data::class,500)->create();
    }
}
