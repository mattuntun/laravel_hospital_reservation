<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientDataModel;
use App\Exports\PtDataExport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelPtDataController extends Controller
{
    public function DownloadReservation() {

        $all_pt_data = PatientDataModel::AllPtData();
        $i = (request()->input('page',1) -1)*10;

        return view('hospital_menu.complete_download_pt_data',['all_pt_data'=>$all_pt_data,'i'=>$i]);

    }

    public function Export() {
        
        ob_end_clean(); // エクセルでの最初の行の空白削除
        ob_start(); // エクセルでの最後の行の空白削除

        return Excel::download(new PtDataExport,'pt_data.xlsx');
    }
}
