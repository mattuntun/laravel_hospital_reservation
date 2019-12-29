{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','新規予約追加カレンダー')

{{-- ヘッダー --}}
@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'新規予約追加',
                  'sub_theme'=>'ご希望の日付を選択してください'])


@endsection

{{-- メイン --}}
@section('main_content')




<form action="/mypage/schedule_add_new_my_data_reservation" method =post>
{{csrf_field()}}
{!!$cal_tag!!}
</form>

<br>
<br>

<form action="/mypage/schedule_add_new_my_data_reservation" method =post>
{{csrf_field()}}
{!!$next_cal_tag!!}
</form>

<br>
<br>

<form action="/mypage/schedule_add_new_my_data_reservation" method =post>
{{csrf_field()}}
{!!$after_next_cal_tag!!}
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
                  'footerbuttom_access2'=>'/index',
                  'footerbuttom_access3'=>'/index',
                  'footerbuttom_access4'=>'/index' ])
@endsection