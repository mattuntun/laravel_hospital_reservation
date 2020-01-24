<?php

namespace App\Exports;

use App\Models\ReservationDataModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReservationExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return ReservationDataModel::all();

        return ReservationDataModel::ForeignAllPatientsDatasForExcel();
    }

    public function headings():array
	{
		return [
				'予約No', 
				'診療科名', 
				'患者ID', 
				'患者姓', 
				'患者名', 
                '生年月日',
                '予約日', 
                '予約時間',
                '紹介状登録有無', 
                '紹介元病院', 
                '紹介元病院TEL', 
                '紹介元受診日', 
                '予約作成日',
                '予約更新日', 
                
            ]; 
    }
}
