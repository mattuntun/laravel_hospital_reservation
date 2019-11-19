<head>
    <link rel="stylesheet" href="{{asset('sab_view_item_css/select_box.css')}}">
</head>

{{-- ブートストラップにより全てのクラス名に関して変更不可 --}}
<select name="{{$select_name}}" class="form-control" size="1" style="height: 100px; font-size: 32px;">
    <option disabled selected value>選択してください</option>
        <option value="{{$option_value1}}">{{$option_display1}}</option>
        <option value="{{$option_value2}}">{{$option_display2}}</option>
        @isset ( $option_value3,$option_value3)
        <option value="{{$option_value3}}">{{$option_display3}}</option>
        @endisset
        @isset ( $option_value4,$option_display4 )
        <option value="{{$option_value4}}">{{$option_display4}}</option>
        @endisset
        @isset ( $option_value5,$option_display5 )
        <option value="{{$option_value5}}">{{$option_display5}}</option>
        @endisset
        @isset ( $option_value6,$option_display6 )
        <option value="{{$option_value6}}">{{$option_display6}}</option> 
        @endisset
        @isset ( $option_value7,$option_display7 )
        <option value="{{$option_value7}}">{{$option_display7}}</option> 
        @endisset
        @isset ($option_value8,$option_display8 )
        <option value="{{$option_value8}}">{{$option_display8}}</option> 
        @endisset
        @isset ( $option_value9,$option_display9 )
        <option value="{{$option_value9}}">{{$option_display9}}</option> 
        @endisset
        @isset ( $option_value10,$option_display10 )
        <option value="{{$option_value10}}">{{$option_display10}}</option> 
        @endisset
</select>


{{-- 使用例・使用方法 --}}
{{-- セレクトボックス入力テキスト --}}
{{--     @include('sab_view_item.select_box',
                  ['select_name'=>'piriod',
                   'option_value1'=>'1_mouth',
                   'option_value2'=>'2_mouth',
                   'option_value3'=>'3_mouth',
                   'option_value4'=>'4_mouth',
                   'option_value5'=>'5_mouth',
                   'option_value6'=>'6_mouth',
                   'option_value7'=>'7_mouth',
                   'option_value8'=>'8_mouth',
                   'option_value9'=>'9_mouth',
                   'option_value10'=>'10_mouth',
                   'option_display1'=>'1カ月先まで予約可能',
                   'option_display2'=>'2カ月先まで予約可能',
                   'option_display3'=>'3カ月先まで予約可能',
                   'option_display4'=>'4カ月先まで予約可能',
                   'option_display5'=>'5カ月先まで予約可能',
                   'option_display6'=>'6カ月先まで予約可能',
                   'option_display7'=>'7カ月先まで予約可能',
                   'option_display8'=>'8カ月先まで予約可能',
                   'option_display9'=>'9カ月先まで予約可能',
                   'option_display10'=>'10カ月先まで予約可能']) --}}