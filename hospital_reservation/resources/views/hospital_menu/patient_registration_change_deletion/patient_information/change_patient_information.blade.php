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
@foreach($pt_datas as $pt_data)
<h6>{{var_dump($pt_datas)}}</h6>

<h3>ID:{{$pt_data->pt_id}}</h3>

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
@endforeach

        {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
        @component('component_item.form')
                 @slot('form_action')
                 /index
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












