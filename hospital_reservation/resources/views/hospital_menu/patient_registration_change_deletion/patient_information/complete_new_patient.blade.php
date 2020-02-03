{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')


{{-- ヘッド --}}
@section('web_title','新規患者登録')


{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'新規患者登録完了'])
@endsection

{{-- メイン --}}
@section('main_content')
<br>

<h2>患者ID</h2>
@foreach($ptData as $items)
<div class="form-group">
    <table border="1" style="border-collapse: collapse table-layout: fixed;
   width: 50%;">
        <tr bgcolor="#DBDBDB">
            <th>
                <h4>患者ID</h4>
            </th>
        </tr>
        <tr bgcolor="white">
            <td>
                <h4>{{$items->pt_id}}</h4>
            </td>
        </tr>
    </table>
</div>
@endforeach

<br>

<h3><b>患者姓名</b></h3>
@foreach($ptData as $items)
<div class="form-group">
    <table border="1" style="border-collapse: collapse table-layout: fixed;
   width: 50%;">
        <tr bgcolor="#DBDBDB">
            <th>
                <h4>患者姓</h4>
            </th>
            <th>
                <h4>患者名</h4>
            </th>
        </tr>
        <tr bgcolor="white">
            <td>
                <h4>{{$items->pt_last_name}}</h4>
            </td>
            <td>
                <h4>{{$items->pt_name}}</h4>
            </td>
        </tr>
        <tr bgcolor="#DBDBDB">
            <th>
                <h4>患者姓(ｶﾀ)</h4>
            </th>
            <th>
                <h4>患者名(ｶﾀ)</h4>
            </th>
        </tr>
        <tr  bgcolor="white">
            <td>
                <h4>{{$items->pt_last_name_kata}}</h4>
            </td>
            <td>
                <h4>{{$items->pt_name_kata}}</h4>
            </td>
        </tr>
    </table>
</div>
@endforeach

<br>
<br>



<h3><b>患者生年月日・アドレス・性別</b></h3>
@foreach($ptData as $items)
<div class="form-group">
    <table border="1" style="border-collapse: collapse table-layout: fixed;
   width: 50%;">
        <tr bgcolor="#DBDBDB">
            <th>
                <h4>生年月日</h4>
            </th>
            <th>
                <h4>アドレス</h4>
            </th>
        </tr>
        <tr bgcolor="white">
            <td>
                <h4>{{$items->birthday}}</h4>
            </td>
            <td>
                <h4>{{$items->email_adress}}</h4>
            </td>
        </tr>
        <tr bgcolor="#DBDBDB">
            <th>
                <h4>性別</h4>
            </th>
            <th>
                <h4></h4>
            </th>
        </tr>
        <tr  bgcolor="white">
            <td>
                <h4>

                    @if($items->sex == 1)
                        男
                    @elseif($items->sex == 2)
                        女
                    @endif

                </h4>
            </td>
            <td>
                <h4></h4>
            </td>
        </tr>
    </table>
</div>
@endforeach


<br>
<br>


        {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
        @component('component_item.form')
                 @slot('form_action')
                 /index/hospital_menu
                 @endslot

                 @slot('form_item4')
                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'',
                                        'buttom_value'=>'設定画面トップへ戻る',
                                        'buttom_access'=>'/index/hospital_menu'])
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
                  'footerbuttom_access2'=>'/admin/index',
                  'footerbuttom_access3'=>'/admin/index',
                  'footerbuttom_access4'=>'/hospital_menu/complete_download_pt_data' ])
@endsection












