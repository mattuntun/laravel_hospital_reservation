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
<h2>紹介状の情報を入力してください</h2>
<br>
<br>


        {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
        @component('component_item.form')
                 @slot('form_action')
                 /index
                 @endslot

                 @slot('form_item1')
                        {{-- 1箇所テキスト(ロング) --}}
                        @include('sab_view_item.texts_one_long',
                                ['label_value'=>'紹介元医療機関名を入力',
                                'label_id'=>'now_delete_pass',
                                'input_id'=>'now_delete_pass',
                                'input_name'=>'delete_pass_now'])
                 @endslot

                 @slot('form_item2')
                        {{-- 1箇所テキスト(ロング) --}}
                        @include('sab_view_item.texts_one_long',
                                ['label_value'=>'紹介元医療機関の電話番号を入力',
                                'label_id'=>'new_delete_pass',
                                'input_id'=>'new_delete_pass',
                                'input_name'=>'delete_password_new'])
                 @endslot

                 @slot('form_item3')
                        {{-- 1箇所テキスト(ロング) --}}
                        @include('sab_view_item.texts_one_long',
                                ['label_value'=>'紹介元医療機関の最終受診日を入力してくださ',
                                'label_id'=>'re_new_delete_pass',
                                'input_id'=>'re_new_delete_pass',
                                'input_name'=>'re_delete_password_new'])
                 @endslot
                       
                 @slot('form_item4')
                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'削除用パスワードを確認後、変更',
                                        'buttom_value'=>'患者削除PASS変更',
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
                  'footerbuttom4'=>'予約情報ダウンロード',
                  'footerbuttom_access1'=>'/index/hospital_menu',
                  'footerbuttom_access2'=>'/index',
                  'footerbuttom_access3'=>'/index',
                  'footerbuttom_access4'=>'/index' ])
@endsection












