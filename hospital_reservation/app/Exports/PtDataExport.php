<?php

namespace App\Exports;

use App\Models\PatientDataModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PtDataExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
            //return PatientDataModel::all();
            return PatientDataModel::AllPtDataDownLoad();
    }

    //出力されるエクセルのヘッダー名を作成
    public function headings():array
    {
        return [
                '患者ID', 
                '患者姓', 
                '患者名', 
                '患者姓(カタカナ)', 
                '患者名(カタカナ)', 
                '性別',
                '生年月日', 
                'Eメールアドレス', 
            ]; 
    }
}
