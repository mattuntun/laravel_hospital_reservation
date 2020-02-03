{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','診療科新規追加')

{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'診療科新規追加'])
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
                 /individual_setting_menu/complete_add_new_department
                 @endslot

                 @slot('form_item1')
                        {{-- 1箇所テキスト(ロング) --}}
                        @include('sab_view_item.texts_one_long',
                                ['label_value'=>'新規診療科名登録',
                                'label_id'=>'new-department-registration',
                                'input_id'=>'new-department-registration',
                                'input_name'=>'new_department'])
                 @endslot
                       
                 @slot('form_item2')
                 {{-- このビューページ専用のサブビューを参照します --}}
                     @include('sab_view_item.only_opening_rest_closing_time')
                 @endslot

                 
                 @slot('form_item3')
                 {{-- このビューページ専用のサブビューを参照します --}}
                     @include('sab_view_item.only_number_of_reservation_screen')
                 @endslot

                 @slot('form_item4')
                 {{-- このビューページ専用のサブビューを参照します --}}
                     @include('sab_view_item.only_status_display_setting_at_add_new_pt')
                @endslot

                @slot('form_item5')
                 {{-- このビューページ専用のサブビューを参照します --}}
                     @include('sab_view_item.only_half_opening_closing_time')
                @endslot

                 @slot('form_item6')
                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'内容を確認して情報を登録',
                                        'buttom_value'=>'内容を登録',
                                        'buttom_access'=>'/individual_setting_menu/complete_add_new_department'])
                 @endslot

                @slot('form_name')
                newPtDatas
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