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
    患者予約情報編集画面トップへ戻ってください
</h2>
    
    <form action="/hospital_menu/edit_patient_appoimtment_information" method = get>
        <div class = "delete_buttom">
                @include('sab_view_item.small_tagged_buttom',
                        ['tagged_value'=>'',
                        'buttom_value'=>'予約情報編集画面へ戻る',
                        'buttom_access'=>'/hospital_menu/edit_patient_appoimtment_information'])
        </div>
    </form>

@endsection


{{-- フッター --}}

{{-- フッター --}}

@section('footer_content')


@endsection