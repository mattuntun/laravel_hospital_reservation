{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','診療科別設定')

{{-- ヘッダー --}}
@section('header_content')
    @include('sab_view_item.header',
              ['main_theme'=>'診療科別設定変更'])
@endsection

{{-- メイン --}}
@section('main_content')
<h2>診療科【{{$department}}】の設定を変更します</h2>
    {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
    @component('component_item.form')
                 @slot('form_action')
                     /individual_setting_menu/complete_individual_change_department
                 @endslot

                 @slot('form_item2')
                     {{-- このビューページ専用のサブビューを参照します --}}
                     @include('sab_view_item.only_opening_rest_closing_time')
                 @endslot

                 @slot('form_item3')
                 <input type="hidden" value = "{{$department}}" name = "search_deparment">
                 @endslot

                 @slot('form_item4')
                 {{-- タグ付ボタン(スモール) --}}
                     @include('sab_view_item.small_tagged_buttom',
                             ['tagged_value'=>'内容を確認して情報を登録',
                              'buttom_value'=>'内容を登録',
                              'buttom_access'=>'/individual_setting_menu/complete_individual_change_department'])
                 @endslot


                 @slot('form_name')
                 
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
                  'footerbuttom_access2'=>'/index',
                  'footerbuttom_access3'=>'/index',
                  'footerbuttom_access4'=>'/index' ])
@endsection












