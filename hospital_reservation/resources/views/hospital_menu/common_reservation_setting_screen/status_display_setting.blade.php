{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','予約数・予約状況表示設定')

<style type="text/css">

.errors {
    width: 500px;
    font-size: 20px;
    color: #e95353;
    border: 1px solid #e95353;
    background-color: #f2dede;
}

</style>

{{-- ヘッダー --}}
@section('header_content')
    @include('sab_view_item.header',
              ['main_theme'=>'予約数・予約状況表示設定',
              'sub_theme'=>'※個別設定を優先反映します。'])
@endsection

{{-- メイン --}}
@section('main_content')
@if($errors->any())
    <div class = "errors">
    <ul>
        @foreach($errors->all() as $error)
                <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>

@endif


    {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
    @component('component_item.form')
                 @slot('form_action')
                     /common_reservation_setting_screen/number_of_reservation/status_display/complete
                 @endslot

                 @slot('form_item2')
                     {{-- このビューページ専用のサブビューを参照します --}}
                     @include('sab_view_item.only_status_display_setting')
                 @endslot

                 @slot('form_item3')
                 {{-- タグ付ボタン(スモール) --}}
                     @include('sab_view_item.small_tagged_buttom',
                             ['tagged_value'=>'内容を確認して登録',
                              'buttom_value'=>'登録',
                              'buttom_access'=>'/common_reservation_setting_screen/number_of_reservation/status_display/complete'])
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
                  'footerbuttom4'=>'予約情報ダウンロード',
                  'footerbuttom_access1'=>'/index/hospital_menu',
                  'footerbuttom_access2'=>'/admin/index',
                  'footerbuttom_access3'=>'/admin/index',
                  'footerbuttom_access4'=>'/hospital_menu/complete_download' ])
@endsection












