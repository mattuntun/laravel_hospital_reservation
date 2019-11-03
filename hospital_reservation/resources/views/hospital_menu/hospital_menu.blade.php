{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','○○医院')


{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'○○医院'])
@endsection



{{-- メイン --}}


@section('main_content')
        {{-- タグ付きボタン(large) --}}
        @include('sab_view_item.large_tagged_bottom',
                  ['large_bottom_tag'=>'設定画面',
                   'large_bottom_value'=>'予約設定の変更をする',
                   'large_bottom_access'=>'/hospital_menu/Common_reservation_setting_screen'])
<br>
<br>
<br>
<br>
<br>

        {{-- タグ付きボタン(large) --}}
        @include('sab_view_item.large_tagged_bottom',
                  ['large_bottom_tag'=>'患者設定',
                   'large_bottom_value'=>'新規患者登録・変更・削除',
                   'large_bottom_access'=>'/hospital_menu/patient_registration_change_deletion'])

        {{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_sinple_bottom',
                  ['large_bottom_value'=>'患者予約情報編集',
                   'large_bottom_access'=>'/hospital_menu/edit_patient_appoimtment_information'])
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