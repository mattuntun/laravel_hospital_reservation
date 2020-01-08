<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;
use App\Calendar;

class CalendarController extends Controller
{
    public function getHoliday(Request $request){
        //休日データの取得
        $data = new Holiday();
        $list = Holiday::all();
        return view('calendar.holiday',['list' => $list,'data' => $data]);
    }

    public function getHolidayId($id)
    {
        // 休日データ取得
        $data = new Holiday();
        if (isset($id)) {
            $data = Holiday::where('id', '=', $id)->first();
        } 
        $list = Holiday::all();
        return view('calendar.holiday', ['list' => $list, 'data' => $data]);
    }

    public function postHoliday(Request $request){
        $validateData = $request->validate([
            'day' =>'required|date_format:Y-m-d',
            'description' => 'required'
        ]);

        //POST受信の休日データ登録      
        if (isset($request->id)) {  
            $holiday = Holiday::where('id', '=',$request->id)->first();
            $holiday->day = $request->day;
            $holiday->description = $request->description;
            $holiday->save();
        } else {
            $holiday = new Holiday(); 
            $holiday->day = $request->day;
            $holiday->description = $request->description;        
            $holiday->save();
        }
        // 休日データ取得
        $data = new Holiday();
        $list = Holiday::all();
        return view('calendar.holiday',['list' => $list, 'data' => $data]);

    }

    public function ViewCalendar(Request $request){
        
        $list =Holiday::all();
        $cal =new Calendar($list);
        $tag = $cal->showCalendarTag($request->month,$request->year);
 
        return view('calendar.viewCalendar',['cal_tag'=>$tag]);
    }

    public function deleteHoliday(request $request){
        //deleteで受診した休日データの削除
        if(isset($request->id)){
            $holiday = Holiday::where('id', '=', $request->id)->first();
            $holiday->delete();
        }
        //休日データ削除
        $data = new Holiday();
        $list = Holiday::all();
        return view('calendar.holiday',['list'=>$list,'data'=>$data]);
    }

}
