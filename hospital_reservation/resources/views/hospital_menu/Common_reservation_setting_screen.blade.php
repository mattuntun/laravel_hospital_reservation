{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','全科共通予約画面設定')

{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'全科共通予約画面設定',
                  'sub_theme'=>'※個別設定を優先反映します'])

@endsection



{{-- メイン --}}


@section('main_content')
        {{-- シンプルボタン(middle) --}}
        @include('sab_view_item.middle_sinple_bottom',
                  ['middle_bottom_value'=>'予約表示設定',
                   'middle_bottom_access'=>'/index'])

        {{-- シンプルボタン(middle) --}}      
        @include('sab_view_item.middle_sinple_bottom',
                  ['middle_bottom_value'=>'休診日設定',
                   'middle_bottom_access'=>'/index'])

        {{-- シンプルボタン(middle) --}}
        @include('sab_view_item.middle_sinple_bottom',
                  ['middle_bottom_value'=>'開診時間(受付時間)設定',
                   'middle_bottom_access'=>'/index'])

        {{-- シンプルボタン(middle) --}}
        @include('sab_view_item.middle_sinple_bottom',
                  ['middle_bottom_value'=>'予約数・状況表示設定',
                   'middle_bottom_access'=>'/index'])

        {{-- シンプルボタン(middle) --}}
        @include('sab_view_item.middle_sinple_bottom',
                  ['middle_bottom_value'=>'診療不可設定(訪問診療・往診等)',
                   'middle_bottom_access'=>'/index'])

        {{-- シンプルボタン(middle) --}}
        @include('sab_view_item.middle_sinple_bottom',
                  ['middle_bottom_value'=>'診療科個別設定',
                   'middle_bottom_access'=>'/index'])


@endsection


{{-- フッター --}}

@section('footer_content')
        @include('sab_view_item.footer',
                  ['footerbottom1'=>'設定画面トップ',
                  'footerbottom2'=>'ログイン画面へ',
                  'footerbottom3'=>'医療機関HPトップ',
                  'footerbottom4'=>'患者情報ダウンロード',
                  'footerbottom_access1'=>'/index/hospital_menu',
                  'footerbottom_access2'=>'/index',
                  'footerbottom_access3'=>'/index',
                  'footerbottom_access4'=>'/index' ])
@endsection