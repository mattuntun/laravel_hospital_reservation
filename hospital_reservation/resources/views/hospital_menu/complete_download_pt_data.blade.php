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