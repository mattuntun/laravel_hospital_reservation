{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')


{{-- ヘッド --}}
@section('web_title','予約追加')


{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'患者予約情報変更',
                   'sub_theme'=>'新規追加'])
@endsection

{{-- メイン --}}
@section('main_content')
<h2>予約を追加したい患者の情報を確認</h2>
@foreach($reservation_datas as $reservation_data)
<h3>{{var_dump($reservation_datas)}}</h3>

@endforeach

<h2>ここからリレーションで取得した値を表示</h2>
@foreach($foreignPtdatas as $foreignPtdata)
<h3>{{var_dump($foreignPtdatas)}}</h3>

@endforeach
<h2>ここでリレーションした値表示終了</h2>

@foreach($pt_datas as $pt_data)
<h3>{{var_dump($pt_datas)}}</h3>
<h2>該当患者情報</h2>
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

        {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
        @component('component_item.form')
                 @slot('form_action')
                 /index
                 @endslot
                       
                 @slot('form_item2')
                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'IDの確認後、検索',
                                        'buttom_value'=>'患者ID検索',
                                        'buttom_access'=>'/index'])
                 @endslot

                 @slot('form_name')
                 pt_search
                 @endslot

         @endcomponent
@endforeach
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












