{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','予約情報DL')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


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
                <th nowrap>紹介状有無</th>
                <th nowrap>紹介元病院</th>
                <th nowrap>紹介元病院TEL</th>
                <th nowrap>紹介元最終受診日</th>
                <th nowrap>予約更新日時</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td nowrap>{{$row->No}}</td>
                    <td nowrap>{{$row->reservation_department}}</td>
                    <td nowrap>{{$row->pt_id}}</td>
                    <td nowrap>{{$row->pt_last_name}}&nbsp;{{$row->pt_name}}</td>
                    <td nowrap>{{$row->birthday}}</td>
                    <td nowrap>{{$row->reservation_date}}</td>
                    <td nowrap>{{$row->reservation_time}}</td>
                    
                    @if($row->letter_of_introduction == 2)
                        <td nowrap>登録なし</td>
                        <td nowrap>登録なし</td>
                        <td nowrap>登録なし</td>
                    @else($row->letter_of_introduction == 1)
                        <td nowrap>{{$row->letter_of_introduction}}</td>
                        <td nowrap>{{$row->introduction_hp_tell}}</td>
                        <td nowrap>{{$row->introduction_hp_date}}</td>
                    @endif
                    <td nowrap>{{$row->updated_at}}</td>
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