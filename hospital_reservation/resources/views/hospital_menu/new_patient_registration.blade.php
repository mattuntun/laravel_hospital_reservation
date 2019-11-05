{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')


{{-- ヘッド --}}
@section('web_title','新規患者登録')


{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'新規患者登録'])
@endsection

{{-- メイン --}}
@section('main_content')

        {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
        @component('component_item.form')
                 @slot('form_action')
                 pt_Confirmation/pt_Confirmation_page.php
                 @endslot

                 @slot('form_item1')
                        {{-- 1箇所テキスト(ロング) --}}
                        @include('sab_view_item.texts_one_long',
                                ['label_value'=>'患者ID登録',
                                'label_id'=>'new-patient-registration',
                                'input_id'=>'new-patient-registration',
                                'input_name'=>'pt_id'])
                 @endslot
                       
                 @slot('form_item2')
                        {{-- 4箇所入力テキスト(タグ付き) --}}
                        @include('sab_view_item.texts_four_tagged',
                                        ['tagged_value'=>'患者名登録',
                                        'label_value1'=>'姓(漢字)',
                                        'label_value2'=>'名(漢字)',
                                        'label_value3'=>'姓(カタカナ)',
                                        'label_value4'=>'名(カタカナ)',
                                        'input_name1'=>'kanji_last_name',
                                        'input_name2'=>'kanji_name',
                                        'input_name3'=>'kata_last_name',
                                        'input_name4'=>'kata_name'])
                 @endslot

                 @slot('form_item3')
                        {{-- 2箇所入力+1箇所セレクトテキスト(タグ付き) --}}
                        @include('sab_view_item.texts_two_select_one_tagged',
                                        ['tagged_value'=>'生年月日・性別・アドレス登録',
                                        'label_value1'=>'生年月日',
                                        'label_value2'=>'メールアドレス',
                                        'input_name1'=>'birthday',
                                        'input_name2'=>'mail_address',
                                        'select_label'=>'性別',
                                        'select_name'=>'sex',
                                        'option_lavel1'=>'男',
                                        'option_lavel2'=>'女',
                                        'option_value1'=>'man',
                                        'option_value2'=>'woman'])
                 @endslot

                 @slot('form_item4')
                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_bottom',
                                        ['tagged_value'=>'内容を確認して情報を登録',
                                        'bottom_value'=>'内容を登録',
                                        'bottom_access'=>'pt_Confirmation/pt_Confirmation_page.php'])
                 @endslot

                 @slot('form_name')
                 nyuuryoku
                 @endslot

         @endcomponent

@endsection

{{-- フッター --}}
@section('footer_content')
        @include('sab_view_item.footer',
                  ['footerbottom1'=>'設定画面トップ',
                  'footerbottom2'=>'ログイン画面へ',
                  'footerbottom3'=>'医療機関HPトップ',
                  'footerbottom4'=>'予約情報ダウンロード',
                  'footerbottom_access1'=>'/index/hospital_menu',
                  'footerbottom_access2'=>'/index',
                  'footerbottom_access3'=>'/index',
                  'footerbottom_access4'=>'/index' ])
@endsection












