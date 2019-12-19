{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','予約情報削除')

<style type="text/css">
.PtInfo{
        margin-bottom: 50px ;
        padding-bottom: 50px;
        border-bottom: 5px dotted rgb(6, 71, 250);
               
}
.ResInfo{
        margin-bottom: 50px ;
        padding-bottom: 50px;
        border-bottom: 5px solid rgb(6, 71, 250);             
}

.delete_buttom{
        text-align:right;
        margin:20px;
}

</style>

{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'予約情報削除',
                  'sub_theme'=>'予約を削除しました'])
@endsection

{{-- メイン --}}
@section('main_content')
<h2>
    <b>予約削除が実施されました。</b></br>
    マイページトップへ戻ってください
</h2>
    
    <form action="/index/mypage_menu" method = post>
    {{csrf_field()}}
        <input type="hidden" name = "search_pt_id" value ="{{$serach_pt_id}}">

            <div class = "delete_buttom">
                @include('sab_view_item.small_tagged_buttom',
                        ['tagged_value'=>'',
                        'buttom_value'=>'マイページへ戻る',
                        'buttom_access'=>'/index/mypage_menu'])
            </div>
    </form>


{{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'新規追加',
                   'large_buttom_access'=>'/edit_patient_appoimtment_information/search_pt_new_reservation'])

{{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'予約削除',
                   'large_buttom_access'=>'/edit_patient_appoimtment_information/deretereservation'])

{{-- シンプルボタン(large) --}}
        @include('sab_view_item.large_simple_buttom',
                  ['large_buttom_value'=>'予約状況確認',
                   'large_buttom_access'=>'/edit_patient_appoimtment_information/check_reservation_status'])
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