{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','予約情報削除')

{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'予約情報削除'])
@endsection



{{-- メイン --}}
<h1>マイページから予約情報削除</h1>

@section('main_content')
{{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'新規追加',
                   'large_buttom_access'=>'/edit_patient_appoimtment_information/search_pt_new_reservation'])

{{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'予約削除',
                   'large_buttom_access'=>'/edit_patient_appoimtment_information/deretereservation'])

{{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'予約状況確認',
                   'large_buttom_access'=>'/edit_patient_appoimtment_information/check_reservation_status'])
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