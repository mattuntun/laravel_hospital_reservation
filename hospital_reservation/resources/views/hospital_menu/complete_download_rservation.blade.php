{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','予約情報DL')

{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'予約情報のダウンロード・アップロードを行います'])
@endsection

{{-- メイン --}}
@section('main_content')
<form action="{{ route('reservation_import') }}" method = "post" enctype = "multipart/form-data">
  {{csrf_field()}}
  <input type="file" name = "reservation_file" accept = ".csv">
  <br>
  <button class = "btn btn-success">インポート予約データ</button>
  <a class = "btn btn-warning" href="{{ route('reservation_export') }}">エクスポート予約データ</a>
</form>

    <table class = "table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>pt_id</th>
                <th>date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{$row->No}}</td>
                    <td>{{$row->pt_id}}</td>
                    <td>{{$row->reservation_date}}</td>
                </tr>
            @endforeach        
        </tbody>
    </table>
    {!! $data->links() !!}

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
                  'footerbuttom4'=>'',
                  'footerbuttom_access1'=>'/index/hospital_menu',
                  'footerbuttom_access2'=>'/admin/index',
                  'footerbuttom_access3'=>'/admin/index',
                  'footerbuttom_access4'=>''])
@endsection