<?php

namespace App\Exports;

use App\Models\PatientDataModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DefaultPtDataExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PatientDataModel::DefaultPtDataForImportExcel();
    }

    //出力されるエクセルのヘッダー名を作成
    public function headings():array
	{
		return [
				'pt_id', 
				'pt_last_name', 
				'pt_name', 
				'pt_last_name_kata', 
				'pt_name_kata', 
                'sex',
                'birthday', 
                'email_adress',
            ]; 
    }
}
