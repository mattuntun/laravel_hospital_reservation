<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PatientDataModel extends Model
{
    protected $table = 'pt_data';
    protected $guarded = array('No');

    public static function getPtData($search_pt_id){
        $ptData = DB::table('pt_data')->where('pt_id',$search_pt_id)->get();
        return $ptData;
    }

    public static function AddNewPtData($request){
        $newPtAdd = new PatientDataModel;
        $newPtAdd->pt_id = $request->input('pt_id');
        $newPtAdd->pt_last_name = $request->input('pt_last_name');
        $newPtAdd->pt_name = $request->input('pt_name');
        $newPtAdd->pt_last_name_kata = $request->input('pt_last_name_kata');
        $newPtAdd->pt_name_kata = $request->input('pt_name_kata');
        $newPtAdd->birthday = $request->input('birthday');
        $newPtAdd->email_adress = $request->input('email_adress');
        $newPtAdd->sex = $request->input('sex');
        $newPtAdd->save();
    }

  
}
