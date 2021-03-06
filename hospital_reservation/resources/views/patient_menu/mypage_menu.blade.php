{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','マイページ')
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
                  ['main_theme'=>'マイページ'])

        @foreach($ptDatas as $ptData)
            <div class = "PtInfo">
                <h2>患者ID：{{$ptData->pt_id}}</h2>
                <h2>患者氏名：{{$ptData->pt_last_name}}　{{$ptData->pt_name}}　様</h2>
            </div>
        @endforeach
@endsection

{{-- メイン --}}
@section('main_content')

<h2 style="font-size:40px; padding-bottom:30px;">予約一覧</h2>


@if($foreignReservationDatas == null)
    <h2>現在、診療予約情報はありません。</h2>
@else
    @foreach($foreignReservationDatas as $foreignReservationData)
        <div class = "ResInfo">
            <ul>
                <li style="font-size:20px;"><b>予約No.{{$foreignReservationData->No}}</b></li>
                <li style="font-size:40px; padding-bottom:30px;"><b>予約診療科:</b>{{$foreignReservationData->reservation_department}}</li>
                <li style="font-size:40px;"><b>予約日:</b>　{{$foreignReservationData->reservation_date}}</li>
                <li style="font-size:40px;"><b>診療開始予定時間:</b>　{{$foreignReservationData->reservation_time}}</li>
                @if($foreignReservationData->letter_of_introduction == 1)

                    <li style="font-size:30px;"><b>紹介状：有</b></li>
                    <li style="font-size:20px;"><b>紹介元病院：{{$foreignReservationData->introduction_hp}}</b></li>
                    <li style="font-size:20px;"><b>紹介元TEL：{{$foreignReservationData->introduction_hp_tell}}</b></li>
                    <li style="font-size:20px;"><b>紹介元最終受診日：{{$foreignReservationData->introduction_hp_date}}</b></li>

                @elseif($foreignReservationData->letter_of_introduction == 2)
 
                    <li style="font-size:30px;"><b>紹介状：無</b></li>
 
                @endif
              
                
                {{-- タグ付ボタン(スモール) --}}
                <form action="/mypage/delete_my_data_reservation" method = post>
                {{csrf_field()}}
                    <input type="hidden" name = "search_reservation_No" value = "{{$foreignReservationData->No}}">
                    <input type="hidden" name = "search_reservation_pt_id" value = "{{$foreignReservationData->pt_id}}">
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
            <input type="hidden"  name = "search_pt_id" value = "{{$ptData->pt_id}}"> 
                {{-- タグ付きボタン(large) --}}
                @include('sab_view_item.middle_submit_simple_buttom',
                           ['middle_buttom_value'=>'新規予約追加',
                            'middle_buttom_access'=>'/mypage/select_add_new_my_data_reservation"'])
            </form>
@endsection


{{-- フッター --}}

@section('footer_content')

        @include('sab_view_item.my_page_footer')

@endsection