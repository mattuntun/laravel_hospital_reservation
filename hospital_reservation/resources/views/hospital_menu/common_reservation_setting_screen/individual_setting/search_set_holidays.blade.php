{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','休診日追加')


{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'休診日を変更する診療科を選択して下さい'])
@endsection

{{-- メイン --}}
@section('main_content')
<h2>
    <b>変更する診療科を選択し、設定変更画面へ移行して下さい</b>
</h2>
    
    <form action="/individual_setting_menu/choice_horiday_setting" method = post>
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
                        'buttom_access'=>'/individual_setting_menu/choice_horiday_setting'])
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
                  'footerbuttom_access2'=>'/index',
                  'footerbuttom_access3'=>'/index',
                  'footerbuttom_access4'=>'/index' ])
@endsection