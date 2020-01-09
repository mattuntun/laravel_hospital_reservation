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

<form action="/mypage/complete_add_new_reservation" method =post>
{{csrf_field()}}
{!!$show_schedule!!}
</form>

{{-- スケジュール表を作成  $parcentsのキーは時間(09:00:00等)--}}
<table class="table table-bordered" style="background: white;         table-layout: fixed; width: 100%;">
    <tr>
        <th style="background: #AEC4E5; text-align:center; width: 70%; font-size:30px;" scope="col">時間</th>
        <th style="background: #AEC4E5; text-align:center; width: 30%; font-size:30px" scope="col">予約空き状況</th>
    </tr>


    @foreach ($parcents as $key=>$parcent)
    <tr>
        <td>
            <form action="/mypage/complete_add_new_reservation" method="post">
            {{csrf_field()}}
            <input type="hidden" name = "search_pt_id" value = "{{$ptData->pt_id}}">
            <input type="hidden" name = "clinical_department" value = "{{$clinical_department}}">
            <input type="hidden" name = "targetDate" value= "{{$targetDate}}">
            <input type="hidden" name = "targetTime" value= "{{$key}}">
                @if($parcent <= $triangleReservationValue )
                    <button type = "button" class="btn btn-lg btn-block" style="background: white; font-size:30px; color:#E9E9E9;">{{substr($key, 0, -3)}}</button>
                </form>
                @else
                    <button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/complete_add_new_reservation">{{substr($key, 0, -3)}}</button>
                </form>
                @endif            
        </td>
        <td style="font-size:30px; text-align:center;">
        @switch($parcent)
            @case($parcent > $doubleCircleReservationValue)
                &#9678;      {{-- ◎ --}}
                @break
            @case($parcent > $circleReservationValue)
                &#9675;      {{-- 〇 --}}
                @break
            @case($parcent > $triangleReservationValue)
                &#9651;      {{-- △ --}}
                @break
            @default
                &#10005;     {{-- ✕ --}}
        @endswitch

        {{$parcent}}％完成時は％表示消す
        </td>
    </tr>
    @endforeach
</table>

</form>
<br>
<br>


@endsection


{{-- フッター --}}

@section('footer_content')

        @include('sab_view_item.my_page_footer')

@endsection