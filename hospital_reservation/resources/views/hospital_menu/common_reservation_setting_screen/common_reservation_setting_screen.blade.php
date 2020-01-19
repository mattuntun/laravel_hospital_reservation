{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','全科共通予約画面設定')

{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'全科共通予約画面設定',
                  'sub_theme'=>'※個別設定を優先反映します'])

@endsection



{{-- メイン --}}


@section('main_content')
        {{-- シンプルボタン(middle) --}}
        @include('sab_view_item.middle_simple_buttom',
                  ['middle_buttom_value'=>'予約表示設定　機能未搭載',
                   'middle_buttom_access'=>'/common_reservation_setting_screen/set_period_and_deadline'])

        {{-- シンプルボタン(middle) --}}      
        @include('sab_view_item.middle_simple_buttom',
                  ['middle_buttom_value'=>'休診日設定',
                   'middle_buttom_access'=>'/common_reservation_setting_screen/choice_horiday_setting'])

        {{-- シンプルボタン(middle) --}}
        @include('sab_view_item.middle_simple_buttom',
                  ['middle_buttom_value'=>'開診･休憩･閉診設定',
                   'middle_buttom_access'=>'/common_reservation_setting_screen/opening_rest_closing_time'])

        {{-- シンプルボタン(middle) --}}
        @include('sab_view_item.middle_simple_buttom',
                  ['middle_buttom_value'=>'予約数・状況表示設定　機能未搭載',
                   'middle_buttom_access'=>'/common_reservation_setting_screen/number_of_reservation_screen'])

        {{-- シンプルボタン(middle) --}}
        @include('sab_view_item.middle_simple_buttom',
                  ['middle_buttom_value'=>'診療不可設定(訪問診療・往診等)　機能未搭載',
                   'middle_buttom_access'=>'/index'])

        {{-- シンプルボタン(middle) --}}
        @include('sab_view_item.middle_simple_buttom',
                  ['middle_buttom_value'=>'診療科個別設定',
                   'middle_buttom_access'=>'/common_reservation_setting_screen/individual_setting_menu'])


@endsection


{{-- フッター --}}

@section('footer_content')
        @include('sab_view_item.footer',
                  ['footerbuttom1'=>'設定画面トップ',
                  'footerbuttom2'=>'ログイン画面へ',
                  'footerbuttom3'=>'医療機関HPトップ',
                  'footerbuttom4'=>'患者情報ダウンロード',
                  'footerbuttom_access1'=>'/index/hospital_menu',
                  'footerbuttom_access2'=>'/admin/index',
                  'footerbuttom_access3'=>'/admin/index',
                  'footerbuttom_access4'=>'/admin/index' ])
@endsection