{{-- レイアウトベースはlayout_hospital_base --}}

@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','予約状況確認')


{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'予約状況確認'])
@endsection



{{-- メイン --}}
@section('main_content')

{{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
        @component('component_item.form')
                 @slot('form_action')
                 /edit_patient_appoimtment_information/target_date_all_reservation_check
                 @endslot

                @slot('form_item1')
                        {{-- 1箇所テキスト(ロング) --}}
                        @include('sab_view_item.date_texts_one_long',
                                ['label_value'=>'予約の詳細情報確認したい日付を入力',
                                'input_name'=>'check_Date']) 

                @endslot

                @slot('form_item2')
                <h2>上記日付において確認したい診療科を選択</h2>
                        <select name="selectedDepartment" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                                @foreach($getDepartments as $getDepartment)
                                <option value="{{$getDepartment->clinical_department}}">{{$getDepartment->clinical_department}}</option>
                                @endforeach
                        </select>
        
                @endslot


                @slot('form_item4')
                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'',
                                        'buttom_value'=>'詳細を確認',
                                        'buttom_access'=>'/edit_patient_appoimtment_information/target_date_all_reservation_check'])
                @endslot
                 
                @slot('form_name')
                 
                @endslot
        @endcomponent

                 
        {{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'カレンダーから確認する場合はこちら',
                   'large_buttom_access'=>'/index'])


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