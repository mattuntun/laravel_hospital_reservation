{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','診療科追加')

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

.scroll-table table {
  display: block;
  overflow-x: scroll;
  white-space: nowrap;
  -webkit-overflow-scrolling: touch;
}
.scroll-table table tbody {
  width: 100%;
  display:table;
}

</style>

{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'新規診療科を追加しました'])
@endsection

{{-- メイン --}}
@section('main_content')
<h2>
    <b>新規診療科の設定は以下の通りです</b></br>
</h2>

<br>
<br>

<h2>診療科名：{{ $changeTimesForView['new_department'] }}</h2>
<div class="form-group">
    <table border="1" style="border-collapse: collapse table-layout: fixed; width: 50%;">
        <tr bgcolor="#DBDBDB">
            <th>
                <h4>開院時間</h4>
            </th>
            <th>
                <h4>閉院時間</h4>
            </th>
        </tr>
        <tr bgcolor="white">
            <td>
                <h4>{{ $changeTimesForView['open_time_for_view'] }}</h4>
            </td>
            <td>
                <h4>{{ $changeTimesForView['close_time_for_view'] }}</h4>
            </td>
        </tr>
        <tr bgcolor="#DBDBDB">
            <th>
                <h4>休憩開始時間</h4>
            </th>
            <th>
                <h4>休憩終了時間</h4>
            </th>
        </tr>
        <tr  bgcolor="white">
            <td>
                <h4>{{ $changeTimesForView['restStart_time_for_view'] }}</h4>
            </td>
            <td>
                <h4>{{ $changeTimesForView['restStop_time_for_view'] }}</h4>
            </td>
        </tr>
    </table>
</div>

<h2>半日診療日：{{ $changeTimesForView['half_week_day_for_view'] }}</h2>
<div class="form-group">
    <table border="1" style="border-collapse: collapse table-layout: fixed; width: 50%;">
        <tr bgcolor="#DBDBDB">
            <th>
                <h4>半日開院時間</h4>
            </th>
            <th>
                <h4>半日閉院時間</h4>
            </th>
        </tr>
        <tr bgcolor="white">
            <td>
                <h4>{{ $changeTimesForView['half_open_time_for_view'] }}</h4>
            </td>
            <td>
                <h4>{{ $changeTimesForView['half_close_time_for_view'] }}</h4>
            </td>
        </tr>
    </table>
</div>

<h2>予約状況設定</h2>{{-- '&#9678';  // ◎'&#9675';  // 〇'&#9651';     // △ --}}
<div class="form-group scroll-table">
    <table border="1" style="border-collapse: collapse table-layout: fixed; width: 100%;">
    <tbody>
        <tr bgcolor="#DBDBDB">
            <th style = "white-space: nowrap;">
                <h4>&#9678となるための空診療数割合</h4>
            </th>
            <th style = "white-space: nowrap;">
                <h4>&#9675となるための空診療数割合</h4>
            </th>
            <th style = "white-space: nowrap;">
                <h4>&#9651となるための空診療数割合</h4>
            </th>
        </tr>
        <tr bgcolor="white">
            <td style = "white-space: nowrap;">
                <h4>{{ $changeTimesForView['more_than_enough_capacity'] }}%以上の時</h4>
            </td>
            <td style = "white-space: nowrap;"> 
                <h4>{{ $changeTimesForView['enough_capacity'] }}%以上の時</h4>
            </td>
            <td style = "white-space: nowrap;">
                <h4>{{ $changeTimesForView['not_enough_capacity'] }}%以上の時</h4>
            </td>
        </tr>
    </tbody>
    </table>
</div>


    <form action="/hospital_menu/Common_reservation_setting_screen" method = post>
    {{csrf_field()}}
            <div class = "delete_buttom">
                @include('sab_view_item.small_tagged_buttom',
                        ['tagged_value'=>'',
                        'buttom_value'=>'設定画面トップへ戻る',
                        'buttom_access'=>'/hospital_menu/Common_reservation_setting_screen'])
            </div>
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
                  'footerbuttom_access2'=>'/admin/index',
                  'footerbuttom_access3'=>'/admin/index',
                  'footerbuttom_access4'=>'/hospital_menu/complete_download' ])
@endsection