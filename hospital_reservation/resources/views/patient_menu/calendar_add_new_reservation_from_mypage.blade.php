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


<h2>診療科：{{$search_Department}}</h2>

<br>
<br>

@foreach($ptDatas as $ptData)
            <div class = "PtInfo">
                <h2>患者ID：{{$ptData->pt_id}}</h2>
                <h2>患者氏名：{{$ptData->pt_last_name}}　{{$ptData->pt_name}}　様</h2>
            </div>
@endforeach
<br>
<br>


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

        @include('sab_view_item.my_page_footer')

@endsection