{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','マイページ')


{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'マイページ'])
@endsection



{{-- メイン --}}


@section('main_content')
{{--
@foreach($ptDatas as $ptData)
<p>{{var_dump($ptDatas)}}</p>
<h2>患者ID：{{$ptData->pt_id}}</h2>
<h2>患者氏名：{{$ptData->pt_last_name}}　{{$ptData->pt_name}}様</h2>
@endforeach
--}}

@foreach($foreignReservationDatas as $foreignReservationData)
<p>{{var_dump($foreignReservationData)}}</p>

@endforeach


<br>
<br>
<br>
<br>
<br>

        {{-- タグ付きボタン(large) --}}
        @include('sab_view_item.large_tagged_buttom',
                  ['large_buttom_tag'=>'患者設定',
                   'large_buttom_value'=>'新規患者登録・変更・削除',
                   'large_buttom_access'=>'/hospital_menu/patient_registration_change_deletion'])

        {{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'患者予約情報編集',
                   'large_buttom_access'=>'/hospital_menu/edit_patient_appoimtment_information'])
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