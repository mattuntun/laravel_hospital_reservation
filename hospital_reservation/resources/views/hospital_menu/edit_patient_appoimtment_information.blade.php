{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','患者予約情報編集')

{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'患者予約情報編集'])
@endsection



{{-- メイン --}}


@section('main_content')
{{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_sinple_bottom',
                  ['large_bottom_value'=>'新規追加',
                   'large_bottom_access'=>'/index'])

{{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_sinple_bottom',
                  ['large_bottom_value'=>'予約削除',
                   'large_bottom_access'=>'/index'])

{{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_sinple_bottom',
                  ['large_bottom_value'=>'予約状況確認',
                   'large_bottom_access'=>'/edit_patient_appoimtment_information/check_reservation_status'])
@endsection


{{-- フッター --}}

@section('footer_content')
        @include('sab_view_item.footer',
                  ['footerbottom1'=>'設定画面トップ',
                  'footerbottom2'=>'ログイン画面へ',
                  'footerbottom3'=>'医療機関HPトップ',
                  'footerbottom4'=>'予約情報ダウンロード',
                  'footerbottom_access1'=>'/index/hospital_menu',
                  'footerbottom_access2'=>'/index',
                  'footerbottom_access3'=>'/index',
                  'footerbottom_access4'=>'/index' ])
@endsection