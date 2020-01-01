{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')


{{-- ヘッド --}}
@section('web_title','紹介状情報追加')


{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'紹介状情報追加'])
@endsection

{{-- メイン --}}
@section('main_content')
@foreach($ptDatas as $ptData)
            <div class = "PtInfo">
                <h2>患者ID：{{$ptData->pt_id}}</h2>
                <h2>患者氏名：{{$ptData->pt_last_name}}　{{$ptData->pt_name}}　様</h2>
            </div>
@endforeach

<h2>紹介状の情報を入力してください</h2>
<br>
<br>


        {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
        @component('component_item.form')
                 @slot('form_action')
                 /mypage/complete_add_letter_of_introduction_data
                 @endslot

                 @slot('form_item1')
                        {{-- 1箇所テキスト(ロング) --}}
                        @include('sab_view_item.texts_one_long',
                                ['label_value'=>'紹介元医療機関名を入力',
                                'label_id'=>'now_delete_pass',
                                'input_id'=>'now_delete_pass',
                                'input_name'=>'introduction_hp'])
                 @endslot

                 @slot('form_item2')
                        {{-- 1箇所テキスト(ロング) --}}
                        @include('sab_view_item.texts_one_long',
                                ['label_value'=>'紹介元医療機関の電話番号を入力',
                                'label_id'=>'new_delete_pass',
                                'input_id'=>'new_delete_pass',
                                'input_name'=>'introduction_hp_tell'])
                 @endslot

                 @slot('form_item3')
                        {{-- 1箇所テキスト(ロング) --}}
                        @include('sab_view_item.date_texts_one_long',
                                ['label_value'=>'最終受信日を入力',
                                'input_name'=>'introduct_lastDate']) 
                 @endslot
                       
                 @slot('form_item4')
                 <input type="hidden" name="pt_id" value="{{$ptData->pt_id}}">
                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'入力内容を確認後、登録',
                                        'buttom_value'=>'登録',
                                        'buttom_access'=>'/mypage/complete_add_letter_of_introduction_data'])
                 @endslot

                 @slot('form_name')
                 pt_delete_search
                 @endslot

         @endcomponent

@endsection

{{-- フッター --}}

@section('footer_content')

        @include('sab_view_item.my_page_footer')

@endsection












