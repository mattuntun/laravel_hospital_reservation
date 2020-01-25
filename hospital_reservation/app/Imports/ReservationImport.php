<?php

namespace App\Imports;

use App\Models\ReservationDataModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReservationImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        return new ReservationDataModel([
            'reservation_date'=> $row['reservation_date'],
            'reservation_time'=> $row['reservation_time'],
            'reservation_department'=> $row['reservation_department'],
            'pt_id'=> $row['pt_id'],
            'letter_of_introduction'=> $row['letter_of_introduction'],
            'introduction_hp'=> $row['introduction_hp'],
            'introduction_hp_tell'=> $row['introduction_hp_tell'],
            'introduction_hp_date'=> $row['introduction_hp_date'],
        ]);
    }
}
