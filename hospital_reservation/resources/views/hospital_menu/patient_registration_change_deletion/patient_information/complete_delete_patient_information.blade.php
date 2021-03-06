{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')


{{-- ヘッド --}}
@section('web_title','患者情報削除')


{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'患者情報削除'])
@endsection

{{-- メイン --}}
@section('main_content')
<h2>患者情報を削除しました</h2>




        {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
        @component('component_item.form')
                 @slot('form_action')
                 /index
                 @endslot

                 @slot('form_item3')
                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'患者情報確認後、削除',
                                        'buttom_value'=>'患者情報削除',
                                        'buttom_access'=>'/index'])
                 @endslot

                 @slot('form_name')
                 pt_delete_search
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












