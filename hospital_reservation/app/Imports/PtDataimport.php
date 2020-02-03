<?php

namespace App\Imports;

use App\Models\PatientDataModel;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithEvents;

class PtDataimport implements ToModel, WithHeadingRow, WithValidation
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

    /**
     * バリデーションルール
     * @return array
     */
    public function rules():array {

        return [
            'pt_id'=>['required','integer','digits_between:1,10:','unique:pt_data,pt_id'],
            'pt_last_name' => ['required','string','max:100'],//
            'pt_name' => ['required','string','max:100'],//
            'pt_last_name_kata' => ['required','string','max:100'],//
            'pt_name_kata' => ['required','string','max:100'],//
            'sex' => ['required','int','between:1,2'],//
            'birthday' => ['required','date_format:Y-m-d'],
            'email_adress' => ['required','email','unique:pt_data,email_adress'],

        ];
    }









}
