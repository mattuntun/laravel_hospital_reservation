{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','診療科別設定変更')

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
                  ['main_theme'=>'予約可能枠に関する変更を行う診療科を選択して下さい'])
@endsection

{{-- メイン --}}
@section('main_content')
<h2>
    <b>変更する診療科を選択し、設定変更画面へ移行して下さい</b>
</h2>
    
    <form action="/individual_setting_menu/number_of_reservation_screen" method = post>
    {{csrf_field()}}
           <select name="search_individual_department" id="" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                <option disabled selected value>選択してください</option>
                @for($i=0; $i < count($kindDepartments); $i++)
                <option value="{{$kindDepartments[$i]}}">{{$kindDepartments[$i]}}</option>
                @endfor
            </select>

            <div class = "delete_buttom">
                @include('sab_view_item.small_tagged_buttom',
                        ['tagged_value'=>'',
                        'buttom_value'=>'設定変更画面へ',
                        'buttom_access'=>'/individual_setting_menu/number_of_reservation_screen'])
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
                  'footerbuttom_access4'=>'/hospital_menu/complete_download' ])
@endsection