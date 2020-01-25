{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','予約数・予約状況表示設定')
<style type="text/css">
.PtInfo{
        margin-bottom: 50px ;
        padding-bottom: 50px;
        border-bottom: 5px dotted rgb(6, 71, 250);
        text-align:center
}


</style>

{{-- ヘッダー --}}
@section('header_content')
    @include('sab_view_item.header',
              ['main_theme'=>'診療科別予約数・予約状況表示設定',])

<div class = "PtInfo">
    <h2>変更診療科：{{$search_individual_department}}</h2>
</div>
@endsection

{{-- メイン --}}
@section('main_content')
    {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
    @component('component_item.form')
                 @slot('form_action')
                     /individual_setting_menu/individual_status_display_setting
                 @endslot

                 @slot('form_item2')
                     {{-- このビューページ専用のサブビューを参照します --}}
                     @include('sab_view_item.only_number_of_reservation_screen')
                 @endslot

                 @slot('form_item3')
                 <input type = "hidden" name = "search_individual_department" value = "{{$search_individual_department}}">
                 {{-- タグ付ボタン(スモール) --}}
                     @include('sab_view_item.small_tagged_buttom',
                             ['tagged_value'=>'空き情報表示設定へ進むと上記が登録されます',
                              'buttom_value'=>'空き情報表示へ進む',
                              'buttom_access'=>'/individual_setting_menu/individual_status_display_setting'])
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












