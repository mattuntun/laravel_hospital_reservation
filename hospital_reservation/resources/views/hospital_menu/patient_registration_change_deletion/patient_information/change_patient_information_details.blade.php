{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')


{{-- ヘッド --}}
@section('web_title','患者情報変更')


{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'患者情報変更'])
@endsection

{{-- メイン --}}
@section('main_content')
<h2>該当患者情報</h2>
<h3>ID:○○○○〇○○</h3>

        {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
        @component('component_item.form')
                 @slot('form_action')
                 /index
                 @endslot

                 @slot('form_item1')
                     {{-- 4箇所入力テキスト(タグ付き) --}}
                     @include('sab_view_item.texts_four_tagged',
                        ['tagged_value'=>'患者名変更',
                        'label_value1'=>'姓(漢字)',
                        'label_value2'=>'名(漢字)',
                        'label_value3'=>'姓(カタカナ)',
                        'label_value4'=>'名(カタカナ)',
                        'input_name1'=>'kanji_last_name',
                        'input_name2'=>'kanji_name',
                        'input_name3'=>'kata_last_name',
                        'input_name4'=>'kata_name'])
                 @endslot
                       
                 @slot('form_item2')
                     {{-- 2箇所入力+1箇所セレクトテキスト(タグ付き) --}}
                     @include('sab_view_item.texts_two_select_one_tagged',
                        ['tagged_value'=>'生年月日・性別・アドレス変更',
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

                 @slot('form_item3')
                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'登録内容確認後、登録',
                                        'buttom_value'=>'登録',
                                        'buttom_access'=>'/index'])
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
                  'footerbuttom_access2'=>'/index',
                  'footerbuttom_access3'=>'/index',
                  'footerbuttom_access4'=>'/index' ])
@endsection












