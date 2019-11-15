<head>
    <link rel="stylesheet" href="{{asset('sab_view_item_css/checkbox.css')}}">
</head>

{{-- ブートストラップにより全てのクラス名に関して変更不可 --}}
<div class="chkbox">
    <input type="checkbox" id="chkbox{{$chkbox_number}}" name="{{$chkbox_name}}" value="1">
    <label for="chkbox{{$chkbox_number}}">{{$lavel_value}}</label>
</div>

{{-- 使用例・使用方法 --}}
{{-- セレクトボックス入力テキスト(タグ付き) --}}
{{--     @include('sab_view_item.checkbox',
                  ['chkbox_name'=>'closed_set',
                  'chkbox_number'=>'1',
                   'lavel_value'=>'以下の設定を適用する']) --}}