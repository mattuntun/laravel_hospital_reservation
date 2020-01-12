{{-- レイアウトベースはlayout_hospital_base --}}

@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','休診日設定')

<style type="text/css">

.PtInfo{
        margin-bottom: 50px ;
        padding-bottom: 50px;
        border-bottom: 5px dotted rgb(6, 71, 250);
}

</style>


{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'日付を指定での休診日設定'])
@endsection



{{-- メイン --}}
@section('main_content')

<div class = "PtInfo">
    <h2>休診日変更診療科：{{$search_individual_department}}</h2>
</div>

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
                        {{-- 1箇所テキスト(ロング) --}}
                        @include('sab_view_item.texts_one_long',
                                ['label_value'=>'休日の理由を入力',
                                'label_id'=>'holiday_reason',
                                'input_id'=>'new-holiday_reason',
                                'input_name'=>'holiday_reason'])
                        
        
                @endslot


                @slot('form_item4')
                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'',
                                        'buttom_value'=>'詳細を確認',
                                        'buttom_access'=>'/index'])
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