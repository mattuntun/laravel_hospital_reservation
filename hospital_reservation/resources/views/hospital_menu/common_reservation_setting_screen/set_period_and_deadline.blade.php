{{-- レイアウトベースはsample_set_period_and_deadline --}}
@extends('layout.sample_set_period_and_deadline')

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
                 <select name="period" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                  <option disabled selected value>選択してください</option>
                  <option value="１カ月先まで予約可能">１カ月先まで予約可能</option>
                  <option value="２カ月先まで予約可能">２カ月先まで予約可能</option>
                  <option value="３カ月先まで予約可能">３カ月先まで予約可能</option>
                  <option value="４カ月先まで予約可能">４カ月先まで予約可能</option>
                  <option value="５カ月先まで予約可能">５カ月先まで予約可能</option>
                  <option value="６カ月先まで予約可能">６カ月先まで予約可能</option>              
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












