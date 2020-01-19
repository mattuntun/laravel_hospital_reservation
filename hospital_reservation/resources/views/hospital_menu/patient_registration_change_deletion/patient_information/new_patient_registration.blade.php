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
                 /patient_registration_change_deletion/complete_new_patient
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
                                        'input_name1'=>'pt_last_name',
                                        'input_name2'=>'pt_name',
                                        'input_name3'=>'pt_last_name_kata',
                                        'input_name4'=>'pt_name_kata'])
                 @endslot

                 
                 @slot('form_item3')
                        {{-- 2箇所入力+1箇所セレクトテキスト(タグ付き) --}}
                        @include('sab_view_item.texts_two_select_one_tagged',
                                        ['tagged_value'=>'生年月日・性別・アドレス登録',
                                        'label_value1'=>'生年月日',
                                        'label_value2'=>'メールアドレス',
                                        'input_name1'=>'birthday',
                                        'input_name2'=>'email_adress',
                                        'select_label'=>'性別',
                                        'select_name'=>'sex',
                                        'option_lavel1'=>'男',
                                        'option_lavel2'=>'女',
                                        'option_value1'=>'1',
                                        'option_value2'=>'2'])
                 @endslot

                 @slot('form_item4')
                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'内容を確認して情報を登録',
                                        'buttom_value'=>'内容を登録',
                                        'buttom_access'=>'/patient_registration_change_deletion/complete_new_patient'])
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
                  'footerbuttom_access4'=>'/admin/index' ])
@endsection












