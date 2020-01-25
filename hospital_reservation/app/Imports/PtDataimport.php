<?php

namespace App\Imports;

use App\Models\PatientDataModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PtDataimport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PatientDataModel([
            'pt_id'=> $row['pt_id'],
            'pt_last_name'=> $row['pt_last_name'],
            'pt_name'=> $row['pt_name'],
            'pt_last_name_kata'=> $row['pt_last_name_kata'],
            'pt_name_kata'=> $row['pt_name_kata'],
            'sex'=> $row['sex'],
            'birthday'=> $row['birthday'],
            'email_adress'=> $row['email_adress'],
        ]);
    }
}
