<?php

namespace App\Exports;

use App\Models\ReservationDataModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReservationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ReservationDataModel::all();
    }
}
