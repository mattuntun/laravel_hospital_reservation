{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')


{{-- ヘッド --}}
@section('web_title','新規予約')

{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'新規予約追加'])
@endsection

{{-- メイン --}}
@section('main_content')
@foreach($ptDatas as $ptData)
            <div class = "PtInfo">
                <h2>患者ID：{{$ptData->pt_id}}</h2>
                <h2>患者氏名：{{$ptData->pt_last_name}}　{{$ptData->pt_name}}　様</h2>
            </div>
@endforeach

<br>
<br>

<h2>予約情報更新</h2>
<h3>予約情報を追加しました</h3>
<br>



        {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
        @component('component_item.form')
                 @slot('form_action')
                 /index
                 @endslot

                 @slot('form_item2')
                 <h3><b>紹介状持参予定患者は紹介状登録ページ</b></h3>

                 @endslot

                 @slot('form_item3')
                 <input type="hidden" name="search_pt_id" value="{{$ptData->pt_id}}">
                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'',
                                        'buttom_value'=>'紹介状登録',
                                        'buttom_access'=>'/index'])
                 @endslot
                 
                 @slot('form_name')
                 
                 @endslot
        @endcomponent

        <br>
        <br>
        <br>

        {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
        @component('component_item.form')
                @slot('form_action')
                        /edit_patient_appoimtment_information/new_reservation
                        @endslot

                @slot('form_item2')
                        <h3><b>追加・削除する場合は患者予約情報変更画面へ</b></h3>
                        <input type="hidden" name="search_pt_id" value="{{$ptData->pt_id}}">
                 @endslot


                 @slot('form_item3')
                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'',
                                        'buttom_value'=>'予約情報変更',
                                        'buttom_access'=>'/edit_patient_appoimtment_information/new_reservation'])
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
                  'footerbuttom4'=>'予約情報ダウンロード',
                  'footerbuttom_access1'=>'/index/hospital_menu',
                  'footerbuttom_access2'=>'/index',
                  'footerbuttom_access3'=>'/index',
                  'footerbuttom_access4'=>'/index' ])

@endsection












