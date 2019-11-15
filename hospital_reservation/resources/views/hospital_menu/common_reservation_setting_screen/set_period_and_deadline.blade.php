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
                    <select name="reservation_period" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                        <option disabled selected value>選択してください</option>
                        <option value="1mouth">１カ月先まで予約可能</option>
                        <option value="2mouth">２カ月先まで予約可能</option>
                        <option value="3mouth">３カ月先まで予約可能</option>
                        <option value="4mouth">４カ月先まで予約可能</option>
                        <option value="5mouth">５カ月先まで予約可能</option>
                        <option value="6mouth">６カ月先まで予約可能</option>              
                    </select>
                 @endslot

                 @slot('form_item3')
                     <br>
                     <br>
                     <br>

                     <h2>予約の締め切り日時の設定を行ってください</h2>
                 @endslot


                 @slot('form_item4')
                    <select name="reservation_deadline" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                        <option disabled selected value>選択してください</option>
                        <option value="1day">診察日当日より１日以内の予約不可</option>
                        <option value="2day">診察日当日より２日以内の予約不可</option>
                        <option value="3day">診察日当日より３日以内の予約不可</option>
                        <option value="4day">診察日当日より４日以内の予約不可</option>
                        <option value="5day">診察日当日より５日以内の予約不可</option>
                        <option value="6day">診察日当日より６日以内の予約不可</option>
                        <option value="7day">診察日当日より７日以内の予約不可</option>              
                    </select>
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












