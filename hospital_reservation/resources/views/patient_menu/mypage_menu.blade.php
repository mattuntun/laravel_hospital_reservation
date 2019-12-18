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
                <li style="font-size:40px; padding-bottom:30px;"><b>予約診療科:</b>{{$foreignReservationData->reservation_department}}</li>
                <li style="font-size:40px;"><b>予約診療時間</b>　{{$foreignReservationData->reservation_time}}　より診療開始</li>
                
                
                {{-- タグ付ボタン(スモール) --}}
                <form action="/mypage/delete_my_data_reservation" method = post>
                {{csrf_field()}}
                    <input type="hidden" name = "search_reservation_No" value = "{{$foreignReservationData->No}}">
                    
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
@endisset


<form action="" method = "post">

        {{-- タグ付きボタン(large) --}}
        @include('sab_view_item.large_tagged_buttom',
                  ['large_buttom_tag'=>'予約変更',
                   'large_buttom_value'=>'新規予約追加',
                   'large_buttom_access'=>'/hospital_menu/patient_registration_change_deletion'])

        {{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'予約削除',
                   'large_buttom_access'=>'/hospital_menu/edit_patient_appoimtment_information'])
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