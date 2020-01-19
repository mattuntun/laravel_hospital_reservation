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
        @include('sab_view_item.large_tagged_buttom',
                  ['large_buttom_tag'=>'設定画面',
                   'large_buttom_value'=>'予約設定の変更をする',
                   'large_buttom_access'=>'/hospital_menu/Common_reservation_setting_screen'])
<br>
<br>
<br>
<br>
<br>

        {{-- タグ付きボタン(large) --}}
        @include('sab_view_item.large_tagged_buttom',
                  ['large_buttom_tag'=>'患者設定',
                   'large_buttom_value'=>'新規患者登録・変更・削除',
                   'large_buttom_access'=>'/hospital_menu/patient_registration_change_deletion'])

        {{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'患者予約情報編集',
                   'large_buttom_access'=>'/hospital_menu/edit_patient_appoimtment_information'])
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