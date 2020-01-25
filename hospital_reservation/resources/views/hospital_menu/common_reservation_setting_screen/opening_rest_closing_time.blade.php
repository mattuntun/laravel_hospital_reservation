{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','全科共通 開院・閉診設定')

{{-- ヘッダー --}}
@section('header_content')
    @include('sab_view_item.header',
              ['main_theme'=>'全科共通 開院・休憩・閉診設定',
              'sub_theme'=>'※個別設定を優先反映します。'])
@endsection

{{-- メイン --}}
@section('main_content')
    {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
    @component('component_item.form')
                 @slot('form_action')
                     /opening_rest_closing_time/complete_set_opening_rest_closing_time
                 @endslot

                 @slot('form_item2')
                     {{-- このビューページ専用のサブビューを参照します --}}
                     @include('sab_view_item.only_opening_rest_closing_time')
                 @endslot

                 @slot('form_item3')
                 <br>
                 <br>

                {{-- このビューページ専用のサブビューを参照します --}}
                @include('sab_view_item.only_half_opening_closing_time')
                @endslot

                 @slot('form_item4')
                 {{-- タグ付ボタン(スモール) --}}
                     @include('sab_view_item.small_tagged_buttom',
                             ['tagged_value'=>'内容を確認して情報を登録',
                              'buttom_value'=>'内容を登録',
                              'buttom_access'=>'/opening_rest_closing_time/complete_set_opening_rest_closing_time'])
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
                  'footerbuttom_access2'=>'/admin/index',
                  'footerbuttom_access3'=>'/admin/index',
                  'footerbuttom_access4'=>'/hospital_menu/complete_download' ])
@endsection












