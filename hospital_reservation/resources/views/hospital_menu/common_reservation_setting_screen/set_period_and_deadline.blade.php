{{-- レイアウトベースはsample_set_period_and_deadline --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','予約表示設定')

{{-- ヘッダー --}}
@section('header_content')
    @include('sab_view_item.header',
              ['main_theme'=>'予約表示(期限・期日)設定',
              'sub_theme'=>'※この設定は診療科別での設定は不可です。'])
@endsection

{{-- メイン --}}
@section('main_content')
    {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
    @component('component_item.form')
                 @slot('form_action')
                     /index
                 @endslot

                 @slot('form_item1')
                     <h2>何カ月先までの予約が可能(カレンダー表示)か、選択してください</h2>
                 @endslot

                 @slot('form_item2')                 
                    {{-- セレクトボックス入力テキスト --}}
                    @include('sab_view_item.select_box',
                             ['select_name'=>'piriod',
                              'option_value1'=>'1_mouth',
                              'option_value2'=>'2_mouth',
                              'option_value3'=>'3_mouth',
                              'option_value4'=>'4_mouth',
                              'option_value5'=>'5_mouth',
                              'option_value6'=>'6_mouth',
                              'option_display1'=>'1カ月先まで予約可能',
                              'option_display2'=>'2カ月先まで予約可能',
                              'option_display3'=>'3カ月先まで予約可能',
                              'option_display4'=>'4カ月先まで予約可能',
                              'option_display5'=>'5カ月先まで予約可能',
                              'option_display6'=>'6カ月先まで予約可能',])                    
                 @endslot

                 @slot('form_item3')
                     <br>
                     <br>
                     <br>

                     <h2>予約の締め切り日時の設定を行ってください</h2>
                 @endslot


                 @slot('form_item4')
                    @include('sab_view_item.select_box',
                                ['select_name'=>'reservation_deadline',
                                'option_value1'=>'1day',
                                'option_value2'=>'2day',
                                'option_value3'=>'3day',
                                'option_value4'=>'4day',
                                'option_value5'=>'5day',
                                'option_value6'=>'6day',
                                'option_display1'=>'診察日当日より１日以内の予約不可',
                                'option_display2'=>'診察日当日より２日以内の予約不可',
                                'option_display3'=>'診察日当日より３日以内の予約不可',
                                'option_display4'=>'診察日当日より４日以内の予約不可',
                                'option_display5'=>'診察日当日より５日以内の予約不可',
                                'option_display6'=>'診察日当日より６日以内の予約不可',])
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












