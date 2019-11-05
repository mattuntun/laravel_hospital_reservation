{{-- レイアウトベースはlayout_hospital_base --}}

@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','予約状況確認')


{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'予約状況確認'])
@endsection



{{-- メイン --}}
@section('main_content')
        {{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_sinple_buttom',
                  ['large_buttom_value'=>'患者別確認',
                   'large_buttom_access'=>'/check_reservation_status/patient'])

        {{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_sinple_buttom',
                  ['large_buttom_value'=>'日付別確認',
                   'large_buttom_access'=>'/index'])


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