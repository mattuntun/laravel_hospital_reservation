<head>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="{{asset('sab_view_item_css/texts_form.css')}}">
</head>
<script>
  $( function() {
    $( "#day" ).datepicker({dateFormat: 'yy-mm-dd'});
  } );
</script>

{{-- ブートストラップにより全てのクラス名に関して変更不可 --}}

<div class="form-group">
    <label for="day" class="control-label">
        <strong>{{$label_value}}</strong>
    </label>
    <input class="form-control" id="day" type="text" name={{$input_name}}>
</div>
<br>
{{-- 使用例・使用方法 --}}
{{-- 1箇所テキスト(ロング) --}}
{{--     @include('sab_view_item.date_texts_one_long',
                  ['label_value'=>'患者ID登録',
                   'input_name'=>'aaaaaaaa']) --}}

    


