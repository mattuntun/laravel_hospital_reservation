{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')


{{-- ヘッド --}}
@section('web_title','予約追加')



{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'患者予約情報変更',
                   'sub_theme'=>''])
@endsection

{{-- メイン --}}
@section('main_content')
<h2>予約を確認・変更したい患者のIDを入力</h2>

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
                 /edit_patient_appoimtment_information/new_reservation
                 @endslot

                 @slot('form_item1')
                        {{-- 1箇所テキスト(ロング) --}}
                        @include('sab_view_item.texts_one_long',
                                ['label_value'=>'患者ID検索',
                                'label_id'=>'pt_id_search',
                                'input_id'=>'pt_id_search',
                                'input_name'=>'search_pt_id'])
                 @endslot
                       
                 @slot('form_item2')
                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'IDの確認後、検索',
                                        'buttom_value'=>'患者ID検索',
                                        'buttom_access'=>'/edit_patient_appoimtment_information/new_reservation'])
                 @endslot

                 @slot('form_name')
                 pt_search
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












