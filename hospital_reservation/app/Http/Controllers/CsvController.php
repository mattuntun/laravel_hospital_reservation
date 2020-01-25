<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservationDataModel;
use App\Exports\ReservationExport;
use App\Imports\ReservationImport;
use Maatwebsite\Excel\Facades\Excel;
//use Excel;



class CsvController extends Controller
{
    //予約情報インポート・エクスポートビューページ
    public function DownloadReservation() {
        
        //予約全情報を10ずつ表示※日付降順⇒時間昇順⇒診療科昇順
        $data = ReservationDataModel::ForeignAllPatientsDatas();
        $i = (request()->input('page',1) -1)*10;

        return view('hospital_menu.complete_download_rservation',['data'=>$data,
        'i'=>$i]);
    }

    //予約情報エクスポート
    public function CsvExport() {

        ob_end_clean(); // エクセルでの最初の行の空白削除
        ob_start(); // エクセルでの最後の行の空白削除

        return Excel::download( new ReservationExport,'reservation.xlsx');

    }

    //予約情報インポート
    public function CsvImport(Request $request) {
        $this->validate($request,[
            'select_file'=>'required|mimes:xls,xlsx'
        ]);

        //$path = $request->file('select_file')->getRealPath();
        $file = request()->file('select_file')->getRealPath();

        //$data = Excel::import($path)->get();

        $data = Excel::import(new ReservationDataModel,$file);
            /*
        if($data->count() > 0) {
            foreach($data->toArray() as $key =>$value) {
                foreach($value as $row) {
                    $insert_data[] = array(
                        'reservation_date'=>$row['reservation_date'],
                        'reservation_time'=>$row['reservation_time'],
                        'reservation_department'=>$row['reservation_department'],
                        'pt_id'=>$row['pt_id'],
                        'letter_of_introduction'=>$row['letter_of_introduction'],
                        'introduction_hp'=>$row['introduction_hp'],
                        'introduction_hp_tell'=>$row['introduction_hp_tell'],
                        'introduction_hp_date'=>$row['introduction_hp_date'],


                    );
                }
            }

            if(!empty($insert_data)) {
                DB::table('reservation_data')->insert($insert_data);
            }
        }*/
        return back()->with('success','アップロードされました');

/*
        $file = request()->file('file');
      Excel::import( new ReservationImport, $file);
      return back();

      */
    }


}
