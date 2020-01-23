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
        $data = ReservationDataModel::latest()->paginate(10);
        //$data = ReservationDataModel::ForeignAllPatientsDatas();
        $i = (request()->input('page',1) -1)*10;

        return view('hospital_menu.complete_download_rservation',['data'=>$data,
        'i'=>$i]);
    }

    //予約情報エクスポート
    public function CsvExport() {

        return Excel::download( new ReservationExport,'reservation.csv');

    }

    //予約情報インポート
    public function CsvImport() {
      Excel::import( new ReservationImport, request()->file('file'));
      return back();
    }


}
