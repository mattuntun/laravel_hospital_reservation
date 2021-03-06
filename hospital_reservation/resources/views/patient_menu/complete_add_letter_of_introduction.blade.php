{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')


{{-- ヘッド --}}
@section('web_title','新規予約')

{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'新規予約追加'])
@endsection

{{-- メイン --}}
@section('main_content')

@foreach($ptDatas as $ptData)
            <div class = "PtInfo">
                <h2>患者ID：{{$ptData->pt_id}}</h2>
                <h2>患者氏名：{{$ptData->pt_last_name}}　{{$ptData->pt_name}}　様</h2>
            </div>
@endforeach


<br>
<br>

<h2>紹介状情報登録</h2>
<h3>紹介状情報を追加しました</h3>
<br>



        {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
        @component('component_item.form')
                 @slot('form_action')
                 /index/mypage_menu
                 @endslot

                 @slot('form_item2')
                 <h3><b>マイページへ戻ってください</b></h3>
                 <input type="hidden" name ="search_pt_id" value = "{{$ptData->pt_id}}">

                 @endslot
                 

                 @slot('form_item3')

                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'',
                                        'buttom_value'=>'マイページ',
                                        'buttom_access'=>'/index/mypage_menu'])
                 @endslot
                 
                 @slot('form_name')
                 
                 @endslot
        @endcomponent

        <br>
        <br>
        <br>

@endsection

{{-- フッター --}}

@section('footer_content')

        @include('sab_view_item.my_page_footer')

@endsection












