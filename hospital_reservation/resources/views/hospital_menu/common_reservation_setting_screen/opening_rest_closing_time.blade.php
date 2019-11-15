{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','全科共通休診日設定')

{{-- ヘッダー --}}
@section('header_content')
    @include('sab_view_item.header',
              ['main_theme'=>'全科共通休診日設定',
              'sub_theme'=>'※個別設定を優先反映します。'])
@endsection

{{-- メイン --}}
@section('main_content')
    {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
    @component('component_item.form')
                 @slot('form_action')
                     /index
                 @endslot

                 @slot('form_item1')
                    {{-- チェックボックスのサブビューを参照します --}}
                    @include('sab_view_item.checkbox',
                             ['chkbox_name'=>'closed_set',
                             'chkbox_number'=>'1',
                              'lavel_value'=>'以下の設定を適用する'])
                 @endslot
                 @slot('form_item2')
                     {{-- このビューページ専用のサブビューを参照します --}}
                     @include('sab_view_item.omly_horiday_setteing')
                 @endslot

                 @slot('form_item3')
                    {{-- チェックボックスのサブビューを参照します --}}
                    @include('sab_view_item.checkbox',
                             ['chkbox_name'=>'closed_set',
                             'chkbox_number'=>'2',
                              'lavel_value'=>'以下の設定を適用する'])
                 @endslot
                 @slot('form_item4')
                     {{-- このビューページ専用のサブビューを参照します --}}
                     @include('sab_view_item.omly_horiday_setteing')
                 @endslot

                 @slot('form_item5')
                    {{-- チェックボックスのサブビューを参照します --}}
                    @include('sab_view_item.checkbox',
                             ['chkbox_name'=>'closed_set',
                             'chkbox_number'=>'3',
                              'lavel_value'=>'以下の設定を適用する'])
                 @endslot
                 @slot('form_item6')
                     {{-- このビューページ専用のサブビューを参照します --}}
                     @include('sab_view_item.omly_horiday_setteing')
                 @endslot

                 @slot('form_item7')
                    {{-- チェックボックスのサブビューを参照します --}}
                    @include('sab_view_item.checkbox',
                             ['chkbox_name'=>'closed_set',
                             'chkbox_number'=>'4',
                              'lavel_value'=>'以下の設定を適用する'])
                 @endslot
                 @slot('form_item8')
                     {{-- このビューページ専用のサブビューを参照します --}}
                     @include('sab_view_item.omly_horiday_setteing')
                 @endslot

                 @slot('form_item9')
                     {{-- タグ付ボタン(スモール) --}}
                     @include('sab_view_item.small_tagged_buttom',
                              ['tagged_value'=>'内容を確認して情報を登録',
                               'buttom_value'=>'内容を登録',
                               'buttom_access'=>'/index'])
                 @endslot

      
                 @slot('form_name')
                 nyuuryoku
                 @endslot
    @endcomponent

@endsection


{{-- フッター --}}
@section('footer_content')
        @include('sab_view_item.footer',
                  ['footerbuttom1'=>'設定画面トップ',
                  'footerbuttom2'=>'ログイン画面へ',
                  'footerbuttom3'=>'医療機関HPトップ',
                  'footerbuttom4'=>'患者情報ダウンロード',
                  'footerbuttom_access1'=>'/index/hospital_menu',
                  'footerbuttom_access2'=>'/index',
                  'footerbuttom_access3'=>'/index',
                  'footerbuttom_access4'=>'/index' ])
@endsection












