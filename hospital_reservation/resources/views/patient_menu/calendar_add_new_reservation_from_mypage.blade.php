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

<h2>診療科【{{$getDepartmentDatas->clinical_department}}】の予約状況は以下の通りです。</h2>
<br>
<h3>明日移行の日付をクリックし、予約時間の指定へ進んでください</h3>
<br>
<br>


<form action="/mypage/schedule_add_new_my_data_reservation" method =post>
{{csrf_field()}}
{!!$cal_tag!!}
<br>
<br>
location.href=/mypage/schedule_add_new_my_data_reservation?target_day=$day &target_month=$month &target_year=$year
{!!$next_cal_tag!!}
<br>
<br>

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