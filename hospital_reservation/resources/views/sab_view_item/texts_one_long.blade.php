<head>
    <link rel="stylesheet" href="{{asset('sab_view_item_css/texts_form.css')}}">
</head>

{{-- ブートストラップにより全てのクラス名に関して変更不可 --}}

<div class="form-group">
    <label class="control-label" id={{$label_id}}>
        <strong>{{$label_value}}</strong>
    </label>
    <input class="form-control" id={{$input_id}} type="text" name={{$input_name}}>
</div>
<br>
{{-- 使用例・使用方法 --}}
{{-- 1箇所テキスト(ロング) --}}
{{--     @include('sab_view_item.texts_one_long',
                  ['label_value'=>'患者ID登録',
                   'label_id'=>'new-patient-registration',
                   'input_id'=>'new-patient-registration',
                   'input_value'=>'input']) --}}