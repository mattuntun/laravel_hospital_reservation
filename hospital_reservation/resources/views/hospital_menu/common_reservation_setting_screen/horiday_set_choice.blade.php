{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','休診日設定')

{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'休診日設定'])

@endsection



{{-- メイン --}}


@section('main_content')
        {{-- シンプルボタン(middle) --}}
        @include('sab_view_item.middle_simple_buttom',
                  ['middle_buttom_value'=>'隔週の休日設定を追加',
                   'middle_buttom_access'=>'/common_reservation_setting_screen/horiday_setting'])

        {{-- シンプルボタン(middle) --}}      
        @include('sab_view_item.middle_simple_buttom',
                  ['middle_buttom_value'=>'日付を指定して休日を追加　この先未機能',
                   'middle_buttom_access'=>'/index'])

@endsection


{{-- フッター --}}

@section('footer_content')
        @include('sab_view_item.footer',
                  ['footerbuttom1'=>'設定画面トップ',
                  'footerbuttom2'=>'ログイン画面へ',
                  'footerbuttom3'=>'医療機関HPトップ',
                  'footerbuttom4'=>'患者情報ダウンロード',
                  'footerbuttom_access1'=>'/index/hospital_menu',
                  'footerbuttom_access2'=>'/index',
                  'footerbuttom_access3'=>'/index',
                  'footerbuttom_access4'=>'/index' ])
@endsection