{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')


{{-- ヘッド --}}
@section('web_title','予約追加')
<style type="text/css">

.ResInfo{
        margin-bottom: 50px ;
        padding-bottom: 50px;
        border-bottom: 5px solid rgb(6, 71, 250);
               
}

</style>


{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'患者予約情報変更',
                   'sub_theme'=>'新規追加'])
@endsection

{{-- メイン --}}
@section('main_content')
<h2>予約を追加したい患者の情報を確認</h2>
@foreach($foreignPatientDatas as $foreignPatientData)
            <div class = "PtInfo">
                <h2>患者ID：{{$foreignPatientData->pt_id}}</h2>
                <h2>カナ氏名：{{$foreignPatientData->pt_last_name_kata}}　{{$foreignPatientData->pt_name_kata}}</h2>

                <h2>患者氏名：{{$foreignPatientData->pt_last_name}}　{{$foreignPatientData->pt_name}}　様</h2>
            </div>
@endforeach
<br>
<br>



@foreach($reservation_datas as $reservation_data)
<div class = "ResInfo">
            <ul>
                <li style="font-size:40px; padding-bottom:30px;"><b>予約診療科:</b>{{$reservation_data->reservation_department}}</li>
                <li style="font-size:40px;"><b>予約日:</b>　{{$reservation_data->reservation_date}}</li>
                <li style="font-size:40px;"><b>診療開始予定時間:</b>　{{$reservation_data->reservation_time}}　より診療開始</li>
                
                
                {{-- タグ付ボタン(スモール) --}}
                <form action="/edit_patient_appoimtment_information/delete_reservation" method = post>
                {{csrf_field()}}
                    <input type="hidden" name = "search_reservation_No" value = "{{$reservation_data->No}}">
                    <input type="hidden" name = "search_reservation_pt_id" value = "{{$reservation_data->pt_id}}">
                    <div class = "delete_buttom">

                    @include('sab_view_item.small_tagged_buttom',
                            ['tagged_value'=>'',
                            'buttom_value'=>'予約削除ページへ',
                            'buttom_access'=>'/edit_patient_appoimtment_information/delete_reservation'])
                    </div>
                </form>
            </ul>
        </div>

@endforeach

        <form action="/mypage/select_add_new_my_data_reservation" method = post>
        {{csrf_field()}}
        <input type="hidden"  name = "search_pt_id" value = "{{$reservation_data->pt_id}}"> 
            {{-- タグ付きボタン(large) --}}
            @include('sab_view_item.middle_submit_simple_buttom',
                    ['middle_buttom_value'=>'新規予約追加',
                    'middle_buttom_access'=>'/mypage/select_add_new_my_data_reservation"'])
        </form>
                 

@endsection

{{-- フッター --}}
@section('footer_content')
        @include('sab_view_item.footer',
                  ['footerbuttom1'=>'設定画面トップ',
                  'footerbuttom2'=>'ログイン画面へ',
                  'footerbuttom3'=>'医療機関HPトップ',
                  'footerbuttom4'=>'予約情報ダウンロード',
                  'footerbuttom_access1'=>'/index/hospital_menu',
                  'footerbuttom_access2'=>'/index',
                  'footerbuttom_access3'=>'/index',
                  'footerbuttom_access4'=>'/index' ])
@endsection












