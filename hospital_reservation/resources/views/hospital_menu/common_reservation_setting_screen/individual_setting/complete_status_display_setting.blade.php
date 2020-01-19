{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','予約数・予約状況表示設定')

<style type="text/css">
.PtInfo{
        margin-bottom: 50px ;
        padding-bottom: 50px;
        border-bottom: 5px dotted rgb(6, 71, 250);
        text-align:center;    
}

</style>

{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'予約数・予約状況表示設定'])

<div class = "PtInfo">
    <h2>変更診療科：{{$search_individual_department}}</h2>
</div>
@endsection

{{-- メイン --}}
@section('main_content')
<h2>
    <b>診療科別の予約数・予約状況表示設定の変更が実施されました。</b></br>
    設定画面トップへ戻ってください
</h2>

    
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
                  'footerbuttom_access4'=>'/admin/index' ])
@endsection