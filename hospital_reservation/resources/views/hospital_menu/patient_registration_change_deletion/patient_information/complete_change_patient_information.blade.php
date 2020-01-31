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
<h3>患者情報を変更しました</h3>

<br>

<h2>患者ID：{{ $changePtDatas['search_pt_id'] }}</h2>

<br>

<h3><b>患者姓名</b></h3>



<div class="form-group">
    <table border="1" style="border-collapse: collapse table-layout: fixed; width: 50%;">
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
                <h4>{{ $changePtDatas['ptLastName'] }}</h4>
            </td>
            <td>
                <h4>{{ $changePtDatas['ptName'] }}</h4>
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
                <h4>{{ $changePtDatas['ptLastNameKata'] }}</h4>
            </td>
            <td>
                <h4>{{ $changePtDatas['ptNameKata'] }}</h4>
            </td>
        </tr>
    </table>
</div>


<br>
<br>



<h3><b>患者生年月日・アドレス・性別</b></h3>
<div class="form-group">
    <table border="1" style="border-collapse: collapse table-layout: fixed; width: 50%;">
        <tr bgcolor="#DBDBDB">
            <th>
                <h4>生年月日</h4>
            </th>
            <th>
                <h4>性別</h4>
            </th>
        </tr>
        <tr bgcolor="white">
            <td>
                <h4>{{ $changePtDatas['birthday'] }}</h4>
            </td>
            <td>
                <h4>
                    @if( $changePtDatas['sex'] == 1 )
                        男
                    @elseif( $changePtDatas['sex'] == 2 )
                        女
                    @endif
            </h4>
            </td>
        </tr>
        <tr bgcolor="#DBDBDB">
            <th colspan="2">
                <h4>メールアドレス</h4>
            </th>

        </tr>
        <tr  bgcolor="white">
            <td colspan="2">
                <h4>
                   {{$changePtDatas['email_adress']}}
                </h4>
            </td>

        </tr>
    </table>
</div>

<br>
<br>




        {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
        @component('component_item.form')
                 @slot('form_action')
                 /index/hospital_menu
                 @endslot

                 
                 @slot('form_item3')
                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'設定画面トップへ',
                                        'buttom_value'=>'設定画面トップ',
                                        'buttom_access'=>'/index/hospital_menu'])
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
                  'footerbuttom4'=>'患者情報ダウンロード',
                  'footerbuttom_access1'=>'/index/hospital_menu',
                  'footerbuttom_access2'=>'/admin/index',
                  'footerbuttom_access3'=>'/admin/index',
                  'footerbuttom_access4'=>'/hospital_menu/complete_download_pt_data' ])
@endsection












