<?php

namespace App\Imports;

use App\Models\ReservationDataModel;
use Maatwebsite\Excel\Concerns\ToModel;

class ReservationImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ReservationDataModel([
            'No'=> $row["No"],
            'pt_id' => $rou["pt_id"],
            'reservation_date' => $row["reservation_date"]
        ]);
    }
}
