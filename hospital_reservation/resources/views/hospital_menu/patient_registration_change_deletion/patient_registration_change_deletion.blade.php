{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','患者情報編集')

{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'患者情報編集'])
@endsection



{{-- メイン --}}


@section('main_content')
{{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'新規患者登録',
                   'large_buttom_access'=>'/patient_registration_change_deletion/new_patient_registration'])

{{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'患者情報変更',
                   'large_buttom_access'=>'/patient_registration_change_deletion/search_change_patient_information'])

{{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'患者削除',
                   'large_buttom_access'=>'/patient_registration_change_deletion/search_delete_patient_information'])

{{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'患者削除用パスワード設定',
                   'large_buttom_access'=>'/patient_registration_change_deletion/delete_password_patient_change'])
                   
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