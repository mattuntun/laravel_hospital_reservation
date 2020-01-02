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


<table class="table table-bordered" style="background: white;         table-layout: fixed; width: 100%;">
    <tr>
        <th style="background: #AEC4E5; text-align:center; width: 70%; font-size:30px;" scope="col">時間</th>
        <th style="background: #AEC4E5; text-align:center; width: 30%; font-size:30px" scope="col">予約空き状況</th>
    </tr>
    <tr>
        <td>
            <form action="/mypage/complete_add_new_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "100000">            
                <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/complete_add_new_reservation">10:00</button>
            </form>
        </td>
        <td style="font-size:30px; text-align:center;">
        @switch($ScreenStatusParcent)
            @case($ScreenStatusParcent >= $doubleCircleReservationValue)
                &#9678;      {{-- ◎ --}}
                @break
            @case($ScreenStatusParcent >= $circleReservationValue)
                &#9675;      {{-- 〇 --}}
                @break
            @case($ScreenStatusParcent >= $triangleReservationValue)
                &#9651;      {{-- △ --}}
                @break
            @default
                &#10005;     {{-- ✕ --}}
        @endswitch

        {{$ScreenStatusParcent}}
        {{$doubleCircleReservationValue}}
        </td>
    </tr>
    <tr>
    <td>
            <form action="/mypage/complete_add_new_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "110000">            
                <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/complete_add_new_reservation">11:00</button>
            </form>
        </td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
    <tr>
    <td>
            <form action="/mypage/complete_add_new_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "120000">            
                <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/complete_add_new_reservation">12:00</button>
            </form>
        </td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
    <tr>
    <td>
            <form action="/mypage/complete_add_new_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "130000">            
                <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/complete_add_new_reservation">13:00</button>
            </form>
        </td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
    <tr>
    <td>
            <form action="/mypage/complete_add_new_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "140000">            
                <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/complete_add_new_reservation">14:00</button>
            </form>
        </td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
    <tr>
    <td>
            <form action="/mypage/complete_add_new_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "150000">            
                <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/complete_add_new_reservation">15:00</button>
            </form>
        </td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
    <tr>
    <td>
            <form action="/mypage/complete_add_new_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "160000">            
                <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/complete_add_new_reservation">16:00</button>
            </form>
        </td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
    <tr>
    <td>
            <form action="/mypage/complete_add_new_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "170000">            
                <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/complete_add_new_reservation">17:00</button>
            </form>
        </td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
    <tr>
    <td>
            <form action="/mypage/complete_add_new_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "180000">            
                <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/complete_add_new_reservation">18:00</button>
            </form>
        </td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
    <tr>
    <td>
            <form action="/mypage/complete_add_new_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "190000">            
                <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/complete_add_new_reservation">19:00</button>
            </form>
        </td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
</table>

</form>
<br>
<br>


@endsection


{{-- フッター --}}

@section('footer_content')

        @include('sab_view_item.my_page_footer')

@endsection