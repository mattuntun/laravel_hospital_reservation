<?php

namespace App\Imports;

use App\Models\ReservationDataModel;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithEvents;

class ReservationImport implements ToModel, WithValidation, WithHeadingRow
{
    use Importable;

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

    /**
     * バリデーションルール
     * @return array
     */
    public function rules():array {

        return [
            'reservation_date'=>['required','date_format:Y-m-d'],//
            'reservation_time' => ['required', 'date_format:"H:i:s"'],//
            'reservation_department' => ['required', 'exists:clinical_departments,clinical_department'],//
            'pt_id' => ['required','integer','digits_between:1,10:','exists:pt_data,pt_id'],//
            'letter_of_introduction' => ['required', 'int','between:1,2'],//
            'introduction_hp' => ['string','max:100'],//
            'introduction_hp_tell' => ['string','max:30'],
            'introduction_hp_date' => ['date_format:Y-m-d'],

        ];
    }

    /**
     * バリデーションエラー時の処理
     * @param Failure ...$failures
     */
   /*
    public function onFailure(Failure ...$failures)
    {
        foreach ($failures as $failure) {
            //
        }
    }
    */

    /**
     * WithEvents interface needs `registerEvents()`
     */

    /*
    public function registerEvents(): array
    {
        return [
            // Handle by a closure.
            AfterImport::class => function(AfterImport $event) {
                // エラーを纏めて、Excelに出力する
            }
        ];
    }
    */




}
