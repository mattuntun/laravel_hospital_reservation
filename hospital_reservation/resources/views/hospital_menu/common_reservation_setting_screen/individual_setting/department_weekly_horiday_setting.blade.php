{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','隔週休診日設定')

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
              ['main_theme'=>'隔週休診日設定',
              'sub_theme'=>'※個別設定を優先反映します。'])
@endsection

{{-- メイン --}}
@section('main_content')

<div class = "PtInfo">
    <h2>休診日変更診療科：{{$search_individual_department}}</h2>
</div>


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
                     @include('sab_view_item.only_horiday_setteing')
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
                     @include('sab_view_item.only_horiday_setteing')
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
                     @include('sab_view_item.only_horiday_setteing')
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
                     @include('sab_view_item.only_horiday_setteing')
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
                  'footerbuttom4'=>'予約情報ダウンロード',
                  'footerbuttom_access1'=>'/index/hospital_menu',
                  'footerbuttom_access2'=>'/admin/index',
                  'footerbuttom_access3'=>'/admin/index',
                  'footerbuttom_access4'=>'/hospital_menu/complete_download' ])
@endsection












