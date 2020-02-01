{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','予約情報DL')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<style>
/*全てのテーブルを横スクロールさせる*/
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
                  ['main_theme'=>'予約情報のダウンロード・アップロードを行います'])
@endsection

{{-- メイン --}}
@section('main_content')
<h3>予約情報をアップロードする際は所定の書式のエクセルでお願いします</h3>

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

<form action="{{ route('reservation_import') }}" method = "post" enctype = "multipart/form-data">
  {{csrf_field()}}
  <input type="file" name = "select_file" accept = "text/csv">
  <br>
  <br>
  <input type = "submit" class = "btn btn-success" value = "予約データをアップロード">

  <a class = "btn btn-warning" href="{{ route('reservation_export') }}">全予約情報をxlsxでダウンロード</a>
</form>

    <table class = "table table-bordered table-striped">
        <thead>
            <tr>
                <th nowrap>予約No</th>
                <th nowrap>診療科</th>
                <th nowrap>患者ID</th>
                <th nowrap>患者名</th>
                <th nowrap>生年月日</th>
                <th nowrap>予約日</th>
                <th nowrap>予約時間帯</th>
                <th nowrap>紹介元病院</th>
                <th nowrap>紹介元病院TEL</th>
                <th nowrap>紹介元最終受診日</th>
                <th nowrap>予約更新日時</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td nowrap>{{$row->No}}</td>                                        <!-- 予約番号 -->
                    <td nowrap>{{$row->reservation_department}}</td>                    <!-- 診療科 -->
                    <td nowrap>{{$row->pt_id}}</td>                                     <!-- 患者ID -->
                    <td nowrap>{{$row->pt_last_name}}&nbsp;{{$row->pt_name}}</td>       <!-- 患者氏名 -->
                    <td nowrap>{{$row->birthday}}</td>                                  <!-- 生年月日 -->
                    <td nowrap>{{$row->reservation_date}}</td>                          <!-- 予約日 -->
                    <td nowrap>{{$row->reservation_time}}</td>                          <!-- 予約時間 -->
                    
                    @if($row->letter_of_introduction == 2)                              <!-- if紹介状無 -->
                        <td nowrap>登録なし</td>
                        <td nowrap>登録なし</td>
                        <td nowrap>登録なし</td>
                    @else($row->letter_of_introduction == 1)                            <!-- if紹介状有 -->
                        <td nowrap>{{$row->introduction_hp }}</td>                      <!-- 紹介元病院名 -->
                        <td nowrap>{{$row->introduction_hp_tell}}</td>                  <!-- 紹介元TEL -->
                        <td nowrap>{{$row->introduction_hp_date}}</td>                  <!-- 紹介元受診日 -->
                    @endif
                    <td nowrap>{{$row->updated_at}}</td>                                <!--  -->
                </tr>
            @endforeach        
        </tbody>
    </table>
    {!! $data->links() !!}

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
        <li>実際の予約の内、1つの予約情報が例として入力されます。</li>
        <li>アップロードをする際は例を参考に入力内容を変更後、アップロードしてください。</li>
    </ol>
    <br>
    <ul>
        <li>注意事項1：全てのセルの書式設定を"文字列"としてください</li>
        <li>注意事項2：例としてデフォルト入力された予約情報は"行削除"してください</li>
        <li>注意事項3：1列目に入力されているヘッダータイトルは”編集不可”です。</li>
        <li>注意事項4：日付入力は"20200101"等8桁半角入力(若しくはデフォルト入力に従う)</li>
        <li>注意事項5：時間入力は"30分単位"、”24時間表記”として入力。<br>
        exa:午後3時30分と入力したい場合は"15:30:00"とし、必ず秒単位は:00を入力してください</li>
    </ul>

<table>
<colgroup span="8" style="background:#ffe6e6;border:solid 2px #ef534f">

        <tr align="center">
            <th border:dashed 2px #f44336;>エクセル内語句</th>
            <th border:dashed 2px #f44336;>reservation_date</th>
            <th border:dashed 2px #f44336;>reservation_time</th>
            <th border:dashed 2px #f44336;>reservation_department</th>
            <th border:dashed 2px #f44336;>letter_of_introduction</th>
            <th border:dashed 2px #f44336;>introduction_hp</th>
            <th border:dashed 2px #f44336;>introduction_hp_tell</th>
            <th border:dashed 2px #f44336;>introduction_hp_date</th>
        </tr>
        <tr border:dashed 2px #f44336;>
            <th border:dashed 2px #f44336;>エクセル内語句説明</th>
            <td>&nbsp;この列には予約日を入力&nbsp;</td>
            <td>&nbsp;この列には予約時間を入力&nbsp;</td>
            <td>&nbsp;この列には診療科を入力&nbsp;</td>
            <td>&nbsp;紹介状有無を入力。有の場合1、無の場合は2を入力&nbsp;</td>
            <td>&nbsp;紹介元病院を入力。紹介状無の場合、空白&nbsp;</td>
            <td>&nbsp;紹介元病院telを入力。紹介状無の場合、空白&nbsp;</td>
            <td>&nbsp;紹介元病院最終受診日を入力。紹介状無の場合、空白&nbsp;</td>
        </tr>
</table>

<br>
<br>

<a class = "btn btn-warning" href="{{ route('reservation_import_excel') }}">予約情報アップロードの為のxlsxをダウンロード</a>

</div>


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
                  'footerbuttom_access4'=>'/hospital_menu/complete_download_pt_data'])
@endsection