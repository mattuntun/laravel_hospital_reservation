{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','予約数・予約状況表示設定')

{{-- ヘッダー --}}
@section('header_content')
    @include('sab_view_item.header',
              ['main_theme'=>'予約数・予約状況表示設定',
              'sub_theme'=>'※個別設定を優先反映します。'])
@endsection

{{-- メイン --}}
@section('main_content')
    {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
    @component('component_item.form')
                 @slot('form_action')
                     /common_reservation_setting_screen/status_display_setting
                 @endslot

                 @slot('form_item2')
                     {{-- このビューページ専用のサブビューを参照します --}}
                     @include('sab_view_item.only_number_of_reservation_screen')
                 @endslot

                 @slot('form_item3')
                 {{-- タグ付ボタン(スモール) --}}
                     @include('sab_view_item.small_tagged_buttom',
                             ['tagged_value'=>'内容を確認して予約空き情報表示設定へ進む',
                              'buttom_value'=>'空き情報表示へ進む',
                              'buttom_access'=>'/common_reservation_setting_screen/status_display_setting'])
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
                  'footerbuttom_access4'=>'/admin/index' ])
@endsection












