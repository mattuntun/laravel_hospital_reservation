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
<h2 style='color:red;'>&#10005表示であっても予約可能です</h2>
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
            <form action="/edit_patient_appoimtment_information/complete_add_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "090000">
                @if($ScreenStatusParcent09 <= $triangleReservationValue )
                    <button type = "button" class="btn btn-lg btn-block" style="background: white; font-size:30px; color:#E9E9E9;">09:00</button>
                </form>
                @else
                    <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/edit_patient_appoimtment_information/complete_add_reservation">09:00</button>
                </form>
                @endif            
        </td>
        <td style="font-size:30px; text-align:center;">
        @switch($ScreenStatusParcent09)
            @case($ScreenStatusParcent09 > $doubleCircleReservationValue)
                &#9678;      {{-- ◎ --}}
                @break
            @case($ScreenStatusParcent09 > $circleReservationValue)
                &#9675;      {{-- 〇 --}}
                @break
            @case($ScreenStatusParcent09 > $triangleReservationValue)
                &#9651;      {{-- △ --}}
                @break
            @default
                &#10005;     {{-- ✕ --}}
        @endswitch

        {{$ScreenStatusParcent09}}％完成時は％表示消す
        </td>
    </tr>
    <tr>
        <td>
            <form action="/edit_patient_appoimtment_information/complete_add_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "100000">            
                @if($ScreenStatusParcent10 <= $triangleReservationValue )
                    <button type = "button" class="btn btn-lg btn-block" style="background: white; font-size:30px; color:#E9E9E9;">10:00</button>
                </form>
                @else
                    <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/edit_patient_appoimtment_information/complete_add_reservation">10:00</button>
                </form>
                @endif     
        <td style="font-size:30px; text-align:center;">
        @switch($ScreenStatusParcent10)
            @case($ScreenStatusParcent10 > $doubleCircleReservationValue)
                &#9678;      {{-- ◎ --}}
                @break
            @case($ScreenStatusParcent10 > $circleReservationValue)
                &#9675;      {{-- 〇 --}}
                @break
            @case($ScreenStatusParcent10 > $triangleReservationValue)
                &#9651;      {{-- △ --}}
                @break
            @default
                &#10005;     {{-- ✕ --}}
                @break
        @endswitch

        {{$ScreenStatusParcent10}}％
        </td>
    </tr>
    <tr>
        <td>
            <form action="/edit_patient_appoimtment_information/complete_add_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "110000">
                @if($ScreenStatusParcent11 <= $triangleReservationValue )
                    <button type = "button" class="btn btn-lg btn-block" style="background: white; font-size:30px; color:#E9E9E9;">11:00</button>
                </form>
                @else
                    <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/edit_patient_appoimtment_information/complete_add_reservation">11:00</button>
                </form>
                @endif    
        </td>
        <td style="font-size:30px; text-align:center;">
        @switch($ScreenStatusParcent11)
            @case($ScreenStatusParcent11 > $doubleCircleReservationValue)
                &#9678;      {{-- ◎ --}}
                @break
            @case($ScreenStatusParcent11 > $circleReservationValue)
                &#9675;      {{-- 〇 --}}
                @break
            @case($ScreenStatusParcent11 > $triangleReservationValue)
                &#9651;      {{-- △ --}}
                @break
            @default
                &#10005;     {{-- ✕ --}}
                @break
        @endswitch

        {{$ScreenStatusParcent11}}％
        </td>
    </tr>
    <tr>
        <td>
            <form action="/edit_patient_appoimtment_information/complete_add_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "120000">            
                @if($ScreenStatusParcent12 <= $triangleReservationValue )
                    <button type = "button" class="btn btn-lg btn-block" style="background: white; font-size:30px; color:#E9E9E9;">12:00</button>
                </form>
                @else
                    <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/edit_patient_appoimtment_information/complete_add_reservation">12:00</button>
                </form>
                @endif  
        </td>
        <td style="font-size:30px; text-align:center;">
        @switch($ScreenStatusParcent12)
            @case($ScreenStatusParcent12 > $doubleCircleReservationValue)
                &#9678;      {{-- ◎ --}}
                @break
            @case($ScreenStatusParcent12 > $circleReservationValue)
                &#9675;      {{-- 〇 --}}
                @break
            @case($ScreenStatusParcent12 > $triangleReservationValue)
                &#9651;      {{-- △ --}}
                @break
            @default
                &#10005;     {{-- ✕ --}}
                @break
        @endswitch

        {{$ScreenStatusParcent12}}％
        </td>
    </tr>
    <tr>
        <td>
            <form action="/edit_patient_appoimtment_information/complete_add_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "130000">            
                @if($ScreenStatusParcent13 <= $triangleReservationValue )
                    <button type = "button" class="btn btn-lg btn-block" style="background: white; font-size:30px; color:#E9E9E9;">13:00</button>
                </form>
                @else
                    <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/edit_patient_appoimtment_information/complete_add_reservation">13:00</button>
                </form>
                @endif
        </td>
        <td style="font-size:30px; text-align:center;">
        @switch($ScreenStatusParcent13)
            @case($ScreenStatusParcent13 > $doubleCircleReservationValue)
                &#9678;      {{-- ◎ --}}
                @break
            @case($ScreenStatusParcent13 > $circleReservationValue)
                &#9675;      {{-- 〇 --}}
                @break
            @case($ScreenStatusParcent13 > $triangleReservationValue)
                &#9651;      {{-- △ --}}
                @break
            @default
                &#10005;     {{-- ✕ --}}
                @break
        @endswitch

        {{$ScreenStatusParcent13}}％
        </td>
    </tr>
    <tr>
        <td>
            <form action="/edit_patient_appoimtment_information/complete_add_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "140000">            
                @if($ScreenStatusParcent14 <= $triangleReservationValue )
                    <button type = "button" class="btn btn-lg btn-block" style="background: white; font-size:30px; color:#E9E9E9;">14:00</button>
                </form>
                @else
                    <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/edit_patient_appoimtment_information/complete_add_reservation">14:00</button>
                </form>
                @endif
        </td>
        <td style="font-size:30px; text-align:center;">
        @switch($ScreenStatusParcent14)
            @case($ScreenStatusParcent14 > $doubleCircleReservationValue)
                &#9678;      {{-- ◎ --}}
                @break
            @case($ScreenStatusParcent14 > $circleReservationValue)
                &#9675;      {{-- 〇 --}}
                @break
            @case($ScreenStatusParcent14 > $triangleReservationValue)
                &#9651;      {{-- △ --}}
                @break
            @default
                &#10005;     {{-- ✕ --}}
                @break
        @endswitch

        {{$ScreenStatusParcent14}}％
        </td>
    </tr>
    <tr>
        <td>
            <form action="/edit_patient_appoimtment_information/complete_add_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "150000">            
                @if($ScreenStatusParcent15 <= $triangleReservationValue )
                    <button type = "button" class="btn btn-lg btn-block" style="background: white; font-size:30px; color:#E9E9E9;">15:00</button>
                </form>
                @else
                    <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/edit_patient_appoimtment_information/complete_add_reservation">15:00</button>
                </form>
                @endif
        </td>
        <td style="font-size:30px; text-align:center;">
        @switch($ScreenStatusParcent15)
            @case($ScreenStatusParcent15 > $doubleCircleReservationValue)
                &#9678;      {{-- ◎ --}}
                @break
            @case($ScreenStatusParcent15 > $circleReservationValue)
                &#9675;      {{-- 〇 --}}
                @break
            @case($ScreenStatusParcent15 > $triangleReservationValue)
                &#9651;      {{-- △ --}}
                @break
            @default
                &#10005;     {{-- ✕ --}}
                @break
        @endswitch

        {{$ScreenStatusParcent15}}％
        </td>
    </tr>
    <tr>
        <td>
            <form action="/edit_patient_appoimtment_information/complete_add_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "160000">            
                @if($ScreenStatusParcent16 <= $triangleReservationValue )
                    <button type = "button" class="btn btn-lg btn-block" style="background: white; font-size:30px; color:#E9E9E9;">16:00</button>
                </form>
                @else
                    <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/edit_patient_appoimtment_information/complete_add_reservation">16:00</button>
                </form>
                @endif
        </td>
        <td style="font-size:30px; text-align:center;">
        @switch($ScreenStatusParcent16)
            @case($ScreenStatusParcent16 > $doubleCircleReservationValue)
                &#9678;      {{-- ◎ --}}
                @break
            @case($ScreenStatusParcent16 > $circleReservationValue)
                &#9675;      {{-- 〇 --}}
                @break
            @case($ScreenStatusParcent16 > $triangleReservationValue)
                &#9651;      {{-- △ --}}
                @break
            @default
                &#10005;     {{-- ✕ --}}
                @break
        @endswitch

        {{$ScreenStatusParcent16}}％
        </td>
    </tr>
    <tr>
        <td>
            <form action="/edit_patient_appoimtment_information/complete_add_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "170000">            
                @if($ScreenStatusParcent17 <= $triangleReservationValue )
                    <button type = "button" class="btn btn-lg btn-block" style="background: white; font-size:30px; color:#E9E9E9;">17:00</button>
                </form>
                @else
                    <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/edit_patient_appoimtment_information/complete_add_reservation">17:00</button>
                </form>
                @endif
        </td>
        <td style="font-size:30px; text-align:center;">
        @switch($ScreenStatusParcent17)
            @case($ScreenStatusParcent17 > $doubleCircleReservationValue)
                &#9678;      {{-- ◎ --}}
                @break
            @case($ScreenStatusParcent17 > $circleReservationValue)
                &#9675;      {{-- 〇 --}}
                @break
            @case($ScreenStatusParcent17 > $triangleReservationValue)
                &#9651;      {{-- △ --}}
                @break
            @default
                &#10005;     {{-- ✕ --}}
                @break
        @endswitch

        {{$ScreenStatusParcent17}}％
        </td>
    </tr>
    <tr>
        <td>
            <form action="/edit_patient_appoimtment_information/complete_add_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "180000">            
                @if($ScreenStatusParcent18 <= $triangleReservationValue )
                    <button type = "button" class="btn btn-lg btn-block" style="background: white; font-size:30px; color:#E9E9E9;">18:00</button>
                </form>
                @else
                    <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/edit_patient_appoimtment_information/complete_add_reservation">18:00</button>
                </form>
                @endif
        </td>
        <td style="font-size:30px; text-align:center;">
        @switch($ScreenStatusParcent18)
            @case($ScreenStatusParcent18 > $doubleCircleReservationValue)
                &#9678;      {{-- ◎ --}}
                @break
            @case($ScreenStatusParcent18 > $circleReservationValue)
                &#9675;      {{-- 〇 --}}
                @break
            @case($ScreenStatusParcent18 > $triangleReservationValue)
                &#9651;      {{-- △ --}}
                @break
            @default
                &#10005;     {{-- ✕ --}}
                @break
        @endswitch

        {{$ScreenStatusParcent18}}％
        </td>
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