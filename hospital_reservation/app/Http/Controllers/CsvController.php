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
        /*
                                        ->orderBy('reservation_date', 'desc')
                                        ->orderBy('reservation_time', 'asc')
                                        ->orderBy('reservation_department', 'asc')
                                        ->paginate(10);                           */        
        $i = (request()->input('page',1) -1)*10;

        return view('hospital_menu.complete_download_rservation',['data'=>$data,
        'i'=>$i]);
    }

    //予約情報エクスポート
    public function CsvExport() {

        ob_end_clean(); // this 最初の行の空白削除
        ob_start(); // and this 最後の行の空白削除
        return Excel::download( new ReservationExport,'reservation.xlsx');

    }

    //予約情報インポート
    public function CsvImport() {
      Excel::import( new ReservationImport, request()->file('file'));
      return back();
    }


}
