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


<h1>{{$target_year}}年{{$target_month}}月{{$target_day}}日</h1>

{{--<h1>{{$clinical_department}}予約状況</h1>
<br>--}}
<br>


<table class="table table-bordered" style="background: white;         table-layout: fixed; width: 100%;">
    <tr>
        <th style="background: #AEC4E5; text-align:center; width: 70%; font-size:30px;" scope="col">時間</th>
        <th style="background: #AEC4E5; text-align:center; width: 30%; font-size:30px" scope="col">予約空き状況</th>
    </tr>
    <tr>
        <td><button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/schedule_add_new_my_data_reservation">9:00</button></td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
    <tr>
        <td><button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/schedule_add_new_my_data_reservation">10:00</button></td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
    <tr>
        <td><button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/schedule_add_new_my_data_reservation">11:00</button></td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
    <tr>
        <td><button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/schedule_add_new_my_data_reservation">12:00</button></td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
    <tr>
        <td><button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/schedule_add_new_my_data_reservation">13:00</button></td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
    <tr>
        <td><button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/schedule_add_new_my_data_reservation">14:00</button></td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
    <tr>
        <td><button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/schedule_add_new_my_data_reservation">15:00</button></td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
    <tr>
        <td><button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/schedule_add_new_my_data_reservation">16:00</button></td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
    <tr>
        <td><button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/schedule_add_new_my_data_reservation">17:00</button></td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
    <tr>
        <td><button type = "submit" class="btn btn-lg btn-block" style="background: white; font-size:30px;" onclick="location.href=/mypage/schedule_add_new_my_data_reservation">18:00</button></td>
        <td style="font-size:30px; text-align:center;">◎</td>
    </tr>
</table>
<br>
<br>


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