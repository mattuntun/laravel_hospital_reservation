{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')


{{-- ヘッド --}}
@section('web_title','新規患者登録')


{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'新規患者登録完了'])
@endsection

{{-- メイン --}}
@section('main_content')
患者情報を新規登録しました

<p>{{var_dump($ptData)}}</p>

        {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
        @component('component_item.form')
                 @slot('form_action')
                 pt_Confirmation/pt_Confirmation_page.php
                 @endslot

                 @slot('form_item4')
                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'内容を確認して情報を登録',
                                        'buttom_value'=>'内容を登録',
                                        'buttom_access'=>'pt_Confirmation/pt_Confirmation_page.php'])
                 @endslot

                 @slot('form_name')
                 nyuuryoku
                 @endslot

         @endcomponent

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
                  'footerbuttom_access4'=>'/hospital_menu/complete_download_pt_data' ])
@endsection












