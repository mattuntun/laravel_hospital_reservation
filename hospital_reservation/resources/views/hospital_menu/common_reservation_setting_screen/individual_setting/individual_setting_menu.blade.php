{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','診療科別予約設定画面')

{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'診療科別予約設定画面'])
@endsection



{{-- メイン --}}


@section('main_content')
{{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'診療科　追加',
                   'large_buttom_access'=>'/individual_setting_menu/add_new_department'])

{{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'診療科　削除',
                   'large_buttom_access'=>'/individual_setting_menu/search_delete_department'])

{{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'開診･休憩･閉診・半日時間設定',
                   'large_buttom_access'=>'/individual_setting_menu/search_individual_change_department'])

{{-- シンプルボタン(middle) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'予約数・状況表示設定',
                   'large_buttom_access'=>'/individual_setting_menu/search_department_possible_number'])

{{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'休診日設定',
                   'large_buttom_access'=>'/individual_setting_menu/search_departmen_horiday_setting'])

{{-- シンプルボタン(large) --}}
{{--
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'未搭載　診療科　追加・削除用パスワード設定',
                   'large_buttom_access'=>'/index'])
                   --}}
                   
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