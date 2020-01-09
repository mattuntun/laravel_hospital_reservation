{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','スケジュール')

{{-- ヘッダー --}}
@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'',
                  'sub_theme'=>'ご希望の時間を選択してください'])


@endsection

{{-- メイン --}}
@section('main_content')
@foreach($ptDatas as $ptData)
            <div class = "PtInfo">
                <h2>患者ID：{{$ptData->pt_id}}</h2>
                <h2>患者氏名：{{$ptData->pt_last_name}}　{{$ptData->pt_name}}　様</h2>
            </div>
@endforeach

<br>


<h1>選択日時：{{$target_year}}年{{$target_month}}月{{$target_day}}日</h1>

<br>

<h1>{{$clinical_department}}予約状況</h1>
<br>
<br>

@php

//診療年月日の文字列データ作成
$targetDate = strval($target_year).strval($target_month).strval(str_pad($target_day, 2, 0, STR_PAD_LEFT));

@endphp

{{-- スケジュール表を作成 --}}
<form action="/mypage/complete_add_new_reservation" method =post>
{{csrf_field()}}
{!!$show_schedule!!}
</form>


<br>
<br>


@endsection


{{-- フッター --}}

@section('footer_content')

        @include('sab_view_item.my_page_footer')

@endsection