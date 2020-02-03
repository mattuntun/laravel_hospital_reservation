<?php

namespace App\Exports;

use App\Models\ReservationDataModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DefaultReservationExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ReservationDataModel::DefaultReservationForImportExcel();
    }

    //出力されるエクセルのヘッダー名を作成
    public function headings():array
	{
		return [
				'reservation_date', 
				'reservation_time', 
				'reservation_department', 
				'pt_id', 
				'letter_of_introduction', 
                'introduction_hp',
                'introduction_hp_tell', 
                'introduction_hp_date',
            ]; 
    }
}
