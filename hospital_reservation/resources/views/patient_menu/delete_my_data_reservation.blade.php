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
                  'sub_theme'=>'マイページで選択した予約を削除します'])
@endsection


{{-- メイン --}}

@section('main_content')
    
        <div class = "PtInfo">
            <h2>患者ID：{{$pt_datas->pt_id}}</h2>
            <h2>患者氏名：{{$pt_datas->pt_last_name}}　{{$pt_datas->pt_name}}　様</h2>
        </div>


@foreach($reservationDatas as $reservationData)
@endforeach

        <div class = "ResInfo">
        <h2 style="font-size:40px; padding-bottom:30px;">削除する情報を確認してください</h2>
            <ul>
                <li style="font-size:40px; padding-bottom:30px;"><b>予約診療科:</b>{{$reservationData->reservation_department}}</li>
                <li style="font-size:40px;"><b>予約診療時間</b>　{{$reservationData->reservation_time}}　より診療開始</li>

                <h2 style="font-size:40px; padding-bottom:30px;">予約情報</h2>
                
                {{-- タグ付ボタン(スモール) --}}
                <form action="/mypage/complete_delete_my_data_reservation" method = post>
                {{csrf_field()}}
                    
                    <input type="hidden" name = "searchReservationNo" value ="{{$reservationData->No}}">
                    <input type="hidden" name = "searchPtId" value ="{{$pt_datas->pt_id}}">
                    <div class = "delete_buttom">
                    @include('sab_view_item.small_tagged_buttom',
                            ['tagged_value'=>'',
                            'buttom_value'=>'予約削除',
                            'buttom_access'=>'/mypage/complete_delete_my_data_reservation'])
                </div>
                </form>
            </ul>
        </div>

@endsection

{{-- フッター --}}

@section('footer_content')

        @include('sab_view_item.my_page_footerDelete')

@endsection