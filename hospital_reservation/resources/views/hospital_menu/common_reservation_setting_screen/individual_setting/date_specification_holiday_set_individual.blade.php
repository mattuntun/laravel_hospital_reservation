{{-- レイアウトベースはlayout_hospital_base --}}

@extends('layout.layout_hospital_base')

{{-- ヘッド --}}
@section('web_title','休診日設定')

<style type="text/css">

.PtInfo{
        margin-bottom: 50px ;
        padding-bottom: 50px;
        border-bottom: 5px dotted rgb(6, 71, 250);
}

</style>


{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'日付指定での休診日設定'])
@endsection



{{-- メイン --}}
@section('main_content')

<div class = "PtInfo">
    <h2>休診日変更診療科：{{$search_individual_department}}</h2>
</div>

{{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
        @component('component_item.form')
                 @slot('form_action')
                 /individual_setting_menu/choice_horiday_setting/date_specification_horiday_setting
                 @endslot

                @slot('form_item1')
                        {{-- 1箇所テキスト(ロング) --}}
                        @include('sab_view_item.date_texts_one_long',
                                ['label_value'=>'予約の詳細情報確認したい日付を入力',
                                'input_name'=>'check_Date']) 

                @endslot

                @slot('form_item2')
                        {{-- 1箇所テキスト(ロング) --}}
                        @include('sab_view_item.texts_one_long',
                                ['label_value'=>'休日の理由を入力',
                                'label_id'=>'holiday_reason',
                                'input_id'=>'holiday_reason',
                                'input_name'=>'holiday_reason'])
                        
        
                @endslot

                @slot('form_item4')
                <input type="hidden" value = {{$search_individual_department}} name = "search_individual_department">
                
                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'',
                                        'buttom_value'=>'内容を登録',
                                        'buttom_access'=>'/individual_setting_menu/choice_horiday_setting/date_specification_horiday_setting'])
                @endslot
                 
                @slot('form_name')
                 
                @endslot
        @endcomponent

    <br />
    <!-- 休日一覧表示 -->
    <h2>休日一覧</h2><h4>削除ボタンにて休日を削除します</h4>
    <table class="table" style="background: white;">
        <thead>
            <tr>
                <th scope="col">日付</th>
                <th scope="col">休日No</th>
                <th scope="col">休日理由</th>
                <th scope="col">作成日</th>
                <th scope="col">更新日</th>
            </tr>
        </thead>
        <tbody>   
        @foreach($get_holiday_datas as $get_holiday_data)
        @endforeach
    @isset($get_holiday_data->holiday_date)
        @foreach($get_holiday_datas as $get_holiday_data)
            <tr>

                <th scope="row">
                    {{$get_holiday_data->holiday_date}}
                </th>
                <td>{{$get_holiday_data->id}}</td>  
                <td>{{$get_holiday_data->description}}</td>  
                <td>{{$get_holiday_data->created_at}}</td>
                <td>{{$get_holiday_data->updated_at}}</td>
                <td>
                    <form action="/individual_setting_menu/choice_horiday_setting/date_specification_horiday_setting" method="post">
                    <input type="hidden" name="id" value="{{$get_holiday_data->id}}">
                    <input type="hidden" name = "delete" value = "delete_on">
                    <input type="hidden" name="search_individual_department" value="{{$search_individual_department}}">
                        {{ method_field('delete') }}
                        {{csrf_field()}} 
                        <button class="btn btn-default" type="submit">
                            Delete
                        </button>
                    </form>
                </td>
        @endforeach
    @else
        <tr>
            <th scope="row">
                現在日付登録されている休診日はこの診療科にはありません
            </th>  
    @endisset   
        </tr>
        </tbody>
    </table>
    
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
                  'footerbuttom_access4'=>'/admin/index' ])
@endsection