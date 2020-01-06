{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','予約詳細情報確認')
<style type="text/css">
.PtInfo{
        margin-bottom: 50px ;
        padding-bottom: 50px;
        border-bottom: 5px dotted rgb(6, 71, 250);
               
}
.ResInfo{
        margin-bottom: 50px ;
        padding-bottom: 50px;
        border-bottom: 5px solid rgb(6, 71, 250);
               
}
.delete_buttom{
        text-align:right;
        margin:20px;
}
</style>

{{-- ヘッダー --}}
@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'予約詳細情報確認'])

            <div class = "PtInfo">
                <h2>年月日：{{$target_date}}</h2>
                <h2>診療科：{{$selectedDepartment}}</h2>
            </div>
        
@endsection

{{-- メイン --}}
@section('main_content')

<h2 style="font-size:40px; padding-bottom:30px;">予約一覧</h2>


@if($all_reservations_and_pt_datas == null)
    <h2>現在、診療予約情報はありません。</h2>
@else
    @foreach($all_reservations_and_pt_datas as $all_reservations_and_pt_data)
        <div class = "ResInfo">
            <ul>
                <li style="font-size:40px;"><b>診療開始予定時間:</b>　{{$all_reservations_and_pt_data->reservation_time}}　より診療開始</li>
                <li style="font-size:40px;">患者ID：<b>{{$all_reservations_and_pt_data->pt_id}}</b></li>
                <li style="font-size:40px;">患者名：<b>{{$all_reservations_and_pt_data->pt_last_name}}　{{$all_reservations_and_pt_data->pt_name}}</b></li>
                    @if($all_reservations_and_pt_data->letter_of_introduction == 2)
                        <li style="font-size:20px;">紹介状情報：なし</li>
                    @else
                        <li style="font-size:20px;">紹介元：{{$all_reservations_and_pt_data->introduction_hp}}</li>
                        <li style="font-size:20px;">紹介元TEL：{{$all_reservations_and_pt_data->introduction_hp_tell}}</li>
                        <li style="font-size:20px;">紹介元最終受診日：{{$all_reservations_and_pt_data->introduction_hp_date}}</li>
                    @endif
                
                
                {{-- タグ付ボタン(スモール) --}}
                <form action="/mypage/delete_my_data_reservation" method = post>
                {{csrf_field()}}
                    <input type="hidden" name = "search_reservation_No" value = "{{$all_reservations_and_pt_data->No}}">
                    <input type="hidden" name = "search_reservation_pt_id" value = "{{$all_reservations_and_pt_data->pt_id}}">
                    <div class = "delete_buttom">

                    @include('sab_view_item.small_tagged_buttom',
                            ['tagged_value'=>'',
                            'buttom_value'=>'予約削除ページへ',
                            'buttom_access'=>'/mypage/delete_my_data_reservation'])
                    </div>
                </form>
            </ul>
        </div>
    @endforeach
@endif


            <form action="/mypage/select_add_new_my_data_reservation" method = post>
            {{csrf_field()}}
            <input type="text"  name = "search_pt_id" value = "インプットの中身を要加筆"> 
                {{-- タグ付きボタン(large) --}}
                @include('sab_view_item.middle_submit_simple_buttom',
                           ['middle_buttom_value'=>'新規予約追加',
                            'middle_buttom_access'=>'/mypage/select_add_new_my_data_reservation"'])
            </form>
@endsection


{{-- フッター --}}

@section('footer_content')



@endsection