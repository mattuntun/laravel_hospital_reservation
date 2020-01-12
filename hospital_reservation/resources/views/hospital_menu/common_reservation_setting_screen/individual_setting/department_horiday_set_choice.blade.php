{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','休診日設定')

{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'休診日設定'])

<style type="text/css">

.PtInfo{
        margin-bottom: 50px ;
        padding-bottom: 50px;
        border-bottom: 5px dotted rgb(6, 71, 250);
               
}

</style>

@endsection



{{-- メイン --}}
@section('main_content')


<div class = "PtInfo">
    <h2>休診日変更診療科：{{$search_individual_department}}</h2>
</div>

        <form action="/individual_setting_menu/choice_horiday_setting/week_horiday_setting" method = "post">
        {{csrf_field()}}       
        <input type="hidden" value = "{{$search_individual_department}}" name = "search_individual_department"> 
        {{-- シンプルボタン(middle) --}}
        @include('sab_view_item.middle_submit_simple_buttom',
                  ['middle_buttom_value'=>'隔週の休日設定を変更',
                   'middle_buttom_access'=>'/individual_setting_menu/choice_horiday_setting/week_horiday_setting'])
        </form>

        {{-- シンプルボタン(middle) --}}      
        @include('sab_view_item.middle_simple_buttom',
                  ['middle_buttom_value'=>'日付を指定して休日を変更　この先未機能',
                   'middle_buttom_access'=>'/index'])

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