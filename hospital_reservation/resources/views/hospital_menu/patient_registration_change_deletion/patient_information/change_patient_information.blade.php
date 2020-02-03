{{-- レイアウトベースはlayout_hospital_base --}}
@extends('layout.layout_hospital_base')


{{-- ヘッド --}}
<head>
    <link rel="stylesheet" href="{{asset('sab_view_item_css/texts_form.css')}}">
@section('web_title','患者情報変更')
</head>

{{-- ヘッダー --}}

@section('header_content')
        @include('sab_view_item.header',
                  ['main_theme'=>'患者情報変更'])
@endsection

{{-- メイン --}}
@section('main_content')

@foreach($pt_datas as $pt_data)


<h2>該当患者情報　ID:{{$pt_data->pt_id}}</h2>

@php
$ptId = $pt_data->pt_id;
$ptLastName = $pt_data->pt_last_name;
$ptName = $pt_data->pt_name;
$ptLastNameKata = $pt_data->pt_last_name_kata;
$ptNameKata = $pt_data->pt_name_kata;
$ptSex = $pt_data->sex;
$ptBirthday  = $pt_data->birthday ;
$ptEmail_adress  = $pt_data->email_adress ;

@endphp

        {{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
        @component('component_item.form')
                 @slot('form_action')
                 /change_patient_information/complete_change_patient_information
                 @endslot

                 @slot('form_item1')
                 <input type="hidden" name = "search_pt_id" value="{{$pt_data->pt_id}}"> 
                
                 @endslot

                 @slot('form_item2')
                        @include('sab_view_item.texts_four_simple_set_value',
                                                ['label_value1'=>'姓(漢字)',
                                                'label_value2'=>'名(漢字)',
                                                'label_value3'=>'姓(カタカナ)',
                                                'label_value4'=>'名(カタカナ)',
                                                'input_name1'=>'change_pt_last_name',
                                                'input_name2'=>'change_pt_name',
                                                'input_name3'=>'change_pt_last_name_kata',
                                                'input_name4'=>'change_pt_name_kata',
                                                'defaultValue1'=>"$ptLastName",
                                                'defaultValue2'=>"$ptName",
                                                'defaultValue3'=>"$ptLastNameKata",
                                                'defaultValue4'=>"$ptNameKata"])                
                 @endslot

                 @slot('form_item3')

                 <div class="form-group">
                    <table>
                        <tr>
                            <td>
                                <label class="control-label">生年月日</label>
                                <input class="form-control" type="text" name="birthday" value={{$ptBirthday}}>
                            </td>
                            <td>
                                <label class="control-label">メールアドレス</label>
                                <input class="form-control" type="text" name="email_adress" value={{$ptEmail_adress}}>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            @if($ptSex == 1)
                            <label class="control-label">性別</label>
                                <select name="sex" class="form-control">
                                    <option selected value=1 class="form-control">男</option>
                                    <option value=2 class="form-control">女</option>
                                </select>

                            @elseif($ptSex == 2)
                            <label class="control-label">性別</label>
                                <select name="sex" class="form-control">
                                    <option value="1" class="form-control">男</option>
                                    <option selected value="2" class="form-control">女</option>
                                </select>

                            @endif

                            </td>
                        </tr>

                    </table>
                </div>
                 
                 @endslot



                 @slot('form_item4')
                        {{-- タグ付ボタン(スモール) --}}
                        @include('sab_view_item.small_tagged_buttom',
                                        ['tagged_value'=>'登録内容確認後、登録',
                                        'buttom_value'=>'登録',
                                        'buttom_access'=>'/change_patient_information/complete_change_patient_information'])
                 @endslot

                 @slot('form_name')
                 {{$pt_datas}}
                 @endslot

         @endcomponent
@endforeach
@endsection

{{-- フッター --}}
@section('footer_content')
        @include('sab_view_item.footer',
                  ['footerbuttom1'=>'設定画面トップ',
                  'footerbuttom2'=>'ログイン画面へ',
                  'footerbuttom3'=>'医療機関HPトップ',
                  'footerbuttom4'=>'患者情報ダウンロード',
                  'footerbuttom_access1'=>'/index/hospital_menu',
                  'footerbuttom_access2'=>'/admin/index',
                  'footerbuttom_access3'=>'/admin/index',
                  'footerbuttom_access4'=>'/hospital_menu/complete_download_pt_data' ])
@endsection












