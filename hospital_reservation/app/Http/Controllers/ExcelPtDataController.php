<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientDataModel;
use App\Exports\PtDataExport;
use App\Exports\DefaultPtDataExport;
use App\imports\PtDataImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelPtDataController extends Controller
{
    //adminでログインしていないとビュー不可
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function DownloadReservation() {

        $all_pt_data = PatientDataModel::AllPtData();
        $i = (request()->input('page',1) -1)*10;

        return view('hospital_menu.complete_download_pt_data',['all_pt_data'=>$all_pt_data,'i'=>$i]);

    }

    //患者情報エクスポート
    public function Export() {
        
        ob_end_clean(); // エクセルでの最初の行の空白削除
        ob_start(); // エクセルでの最後の行の空白削除

        return Excel::download(new PtDataExport,'pt_data.xlsx');
    }

    //患者情報インポート用のエクセルをエクスポート
    public function ExportForImportDefault() {
        
        ob_end_clean(); // エクセルでの最初の行の空白削除
        ob_start(); // エクセルでの最後の行の空白削除

        return Excel::download(new DefaultPtDataExport,'import_default_pt.xlsx');
    }

    //患者情報インポート
    public function import(Request $request) {
        $this->validate($request,[
            'select_file'=>'required|mimes:xls,xlsx'
            ]);

        $file = request()->file('select_file');

        Excel::import(new PtDataImport,$file);

        return back()->with('success','正常にアップロードされた場合は、患者一覧に加えられています');
    }
}
