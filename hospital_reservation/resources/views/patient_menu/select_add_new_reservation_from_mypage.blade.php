{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','新規予約追加')

{{-- ヘッダー --}}
@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'新規予約追加',
                  'sub_theme'=>'希望する診療科を選択してください'])


        @foreach($ptDatas as $ptData)
            <div class = "PtInfo">
                <h2>患者ID：{{$ptData->pt_id}}</h2>
                <h2>患者氏名：{{$ptData->pt_last_name}}　{{$ptData->pt_name}}　様</h2>
            </div>
        @endforeach
@endsection

{{-- メイン --}}
@section('main_content')
    <form action="/mypage/calendar_add_new_my_data_reservation" method =post>
        {{csrf_field()}}
        <select name="selectedDepartment" class="form-control" size="1" style="height: 100px; font-size: 32px;">
        @foreach($getDepartments as $getDepartment)
            <option value="{{$getDepartment->clinical_department}}">{{$getDepartment->clinical_department}}</option>
        @endforeach
        </select>

        @include('sab_view_item.small_tagged_buttom',
                            ['tagged_value'=>'',
                            'buttom_value'=>'新規予約ページへ',
                            'buttom_access'=>'/mypage/calendar_add_new_my_data_reservation'])
        
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