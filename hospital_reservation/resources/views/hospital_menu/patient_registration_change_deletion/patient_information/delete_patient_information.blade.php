{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')


{{-- ヘッド --}}
@section('web_title','患者情報削除')


{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'患者情報削除'])
@endsection

{{-- メイン --}}
@section('main_content')
<h2>該当患者情報</h2>
@foreach($pt_datas as $pt_data)
<h3>ID:{{$pt_data->pt_id}}</h3>
<h6>{{var_dump($pt_datas)}}</h6>

<table>
    <tr>
        <th>
            <h4>患者姓(漢字)</h4>
        </th>
        <th>
            <h4>患者名前(漢字)</h4>
        </th>
    <tr>
        <td>
            <h3>{{$pt_data->pt_last_name}}</h3>
        </td>
        <td>
            <h3>{{$pt_data->pt_name}}</h3>
        </td>
    </tr>
</table>
<table>
    <tr>
        <th>
            <h4>患者姓(カナ)</h4>
        </th>
        <th>
            <h4>患者名前(カナ)</h4>
        </th>
    <tr>
        <td>
            <h3>{{$pt_data->pt_last_name_kata}}</h3>
        </td>
        <td>
            <h3>{{$pt_data->pt_name_kata}}</h3>
        </td>
    </tr>
</table>

@php
$search_pt_id = $pt_data->pt_id;
@endphp

<form action="/patient_registration_change_deletion/complete_delete_patient_information" method = post>
{{ csrf_field() }}

<input type="hidden" name="search_pt_id" value={{$search_pt_id}}>

{{-- タグ付ボタン(スモール) --}}
        @include('sab_view_item.small_tagged_buttom',
                        ['tagged_value'=>'患者情報確認後、削除',
                        'buttom_value'=>'患者情報削除',
                        'buttom_access'=>'/patient_registration_change_deletion/complete_delete_patient_information'])

</form>
        
        {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
        {{--   @component('component_item.form')
                 @slot('form_action')
                 /patient_registration_change_deletion/complete_delete_patient_information
                 @endslot
                
                 @slot('form_item1')
                <input type="hidden" value = {{$search_pt_id}} name = "search_pt_id">
                 @endslot

                 @slot('form_item3')--}}
                        {{-- タグ付ボタン(スモール) --}}
                        {{-- @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'患者情報確認後、削除',
                                        'buttom_value'=>'患者情報削除',
                                        'buttom_access'=>'/patient_registration_change_deletion/complete_delete_patient_information'])
                 @endslot

                 @slot('form_name')
                 $search_pt_id
                 @endslot

         @endcomponent  --}}

@endsection
@endforeach

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












