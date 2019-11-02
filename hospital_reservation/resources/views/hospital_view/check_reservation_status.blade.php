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
        @include('sab_view_item.large_sinple_bottom',
                  ['large_bottom_value'=>'患者別確認',
                   'large_bottom_access'=>'/index'])

        {{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_sinple_bottom',
                  ['large_bottom_value'=>'日付別確認',
                   'large_bottom_access'=>'/index'])


@endsection


{{-- フッター --}}

@section('footer_content')
        @include('sab_view_item.footer',
                  ['footerbottom1'=>'設定画面トップ',
                  'footerbottom2'=>'ログイン画面へ',
                  'footerbottom3'=>'医療機関HPトップ',
                  'footerbottom4'=>'予約情報ダウンロード',
                  'footerbottom_access1'=>'/index/hospital_index',
                  'footerbottom_access2'=>'/index',
                  'footerbottom_access3'=>'/index',
                  'footerbottom_access4'=>'/index' ])
@endsection