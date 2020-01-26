{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','患者情報DL')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<style type="text/css">

table {
  display: block;
  overflow-x: scroll;
  white-space: nowrap;
  -webkit-overflow-scrolling: touch;
}
.box27 {
    position: relative;
    margin: 2em 0;
    padding: 0.5em 1em;
    border: solid 3px #62c1ce;
    
}
.box27 th,td{
    border:solid 1px #aaaaaa;
    
}

.box27 .box-title {
    position: absolute;
    display: inline-block;
    top: -27px;
    left: -3px;
    padding: 0 9px;
    height: 25px;
    line-height: 25px;
    font-size: 17px;
    background: #62c1ce;
    color: #ffffff;
    font-weight: bold;
    border-radius: 5px 5px 0 0;
}
.box27 ol {
    margin: 2px; 
    padding: 0;
    font-weight: bold;
}
.box27 ul {
    margin: 2px; 
    padding: 0;
    font-weight: bold;
    color:red;

}
</style>


{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'患者情報のダウンロード・アップロードを行います'])
@endsection

{{-- メイン --}}
@section('main_content')
<h3>患者情報をアップロードする際は所定の書式のエクセルでお願いします</h3>

@if(count($errors) > 0)
    <div class = "alert alert-danger">
        アップロードエラー<br><br>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if($message = Session::get('success'))
<div class ="alert alert-success alert-block">
    <button type="button" class = "close" data-dismiss = "alert">x</button>
    <strong>{{ $message }}</strong>
</div>
@endif

<form action="{{ route('pt_data_import') }}" method = "post" enctype = "multipart/form-data">
  {{csrf_field()}}
  <input type="file" name = "select_file" accept = "text/csv">
  <br>
  <br>
  <input type = "submit" class = "btn btn-success" value = "患者データをアップロード">

  <a class = "btn btn-warning" href="{{ route('pt_data_export') }}">全患者情報をxlsxでダウンロード</a>
</form>

    <table class = "table table-bordered table-striped">
        <thead>
            <tr>
                <th nowrap>患者ID</th>
                <th nowrap>患者氏名</th>
                <th nowrap>患者氏名(カタカナ)</th>
                <th nowrap>性別</th>
                <th nowrap>生年月日</th>
                <th nowrap>Eメールアドレス</th>
                <th nowrap>情報更新日時</th>
            </tr>
        </thead>
        <tbody>
            @foreach($all_pt_data as $row)
                <tr>
                    <td nowrap>{{$row->pt_id}}</td>
                    <td nowrap>{{$row->pt_last_name}}&nbsp;{{$row->pt_name}}</td>
                    <td nowrap>{{$row->pt_last_name_kata}}&nbsp;{{$row->pt_name_kata}}</td>
                    @if($row->sex == 1)
                    <td nowrap>男</td>
                    @elseif($row->sex == 2)
                    <td nowrap>女</td>
                    @endif
                    <td nowrap>{{$row->birthday}}</td>
                    <td nowrap>{{$row->email_adress}}</td>
                    <td nowrap>{{$row->updated_at}}</td>
                </tr>
            @endforeach        
        </tbody>
    </table>
    {!! $all_pt_data->links() !!}

    <br>
    <br>


    <h2>
        設定画面トップへ戻ってください
    </h2>

    
    <form action="/index/hospital_menu" method = post>
    {{csrf_field()}}
            <div class = "delete_buttom">
                @include('sab_view_item.small_tagged_buttom',
                        ['tagged_value'=>'',
                        'buttom_value'=>'トップへ戻る',
                        'buttom_access'=>'/index/hospital_menu'])
            </div>
    </form>

    <br>
<br>


<div class="box27">
    <span class="box-title">アップロード用Excelダウンロード</span>
    <ol>
        <li>下にあるボタンをクリックするとアップロード用のExcelをダウンロード出来ます。</li>
        <li>実際の患者の内、1つの患者情報が例として入力されます。</li>
        <li>アップロードをする際は例を参考に入力内容を変更後、アップロードしてください。</li>
    </ol>
    <br>
    <ul>
        <li>注意事項1：全てのセルの書式設定を"文字列"としてください</li>
        <li>注意事項2：例としてデフォルト入力された予約情報は"行削除"してください</li>
        <li>注意事項3：1列目に入力されているヘッダータイトルは”編集不可”です。</li>
        <li>注意事項4：日付入力は"20200101"等8桁半角入力(若しくはデフォルト入力に従う)</li>
    </ul>

<table>
<colgroup span="9" style="background:#ffe6e6;border:solid 2px #ef534f">

        <tr align="center">
            <th border:dashed 2px #f44336;>エクセル内語句</th>
            <th border:dashed 2px #f44336;>pt_id</th>
            <th border:dashed 2px #f44336;>pt_last_name</th>
            <th border:dashed 2px #f44336;>pt_name</th>
            <th border:dashed 2px #f44336;>pt_last_name_kata</th>
            <th border:dashed 2px #f44336;>pt_name_kata</th>
            <th border:dashed 2px #f44336;>sex</th>
            <th border:dashed 2px #f44336;>birthday</th>
            <th border:dashed 2px #f44336;>email_adress</th>
        </tr>
        <tr border:dashed 2px #f44336;>
            <th border:dashed 2px #f44336;>エクセル内語句説明</th>
            <td>&nbsp;この列には患者IDを半角入力&nbsp;</td>
            <td>&nbsp;この列には患者姓を全角入力&nbsp;</td>
            <td>&nbsp;この列には患者名を全角入力&nbsp;</td>
            <td>&nbsp;この列には患者姓を半角カナ入力&nbsp;</td>
            <td>&nbsp;この列には患者名を半角カナ入力&nbsp;</td>
            <td>&nbsp;患者性別を入力。男性の場合1、女性の場合は2を半角入力&nbsp;</td>
            <td>&nbsp;患者生年月日を半角8桁入力。&nbsp;</td>
            <td>&nbsp;患者Eメールアドレスを入力。他患者と重複不可&nbsp;</td>
        </tr>
</table>
<br>
<br>

<a class = "btn btn-warning" href="{{ route('pt_data_import_excel') }}">患者情報アップロードの為のxlsxをダウンロード</a>

</div>

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
                  'footerbuttom_access4'=>'/hospital_menu/complete_downloa'])
@endsection