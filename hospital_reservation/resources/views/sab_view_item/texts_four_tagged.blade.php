<head>
    <link rel="stylesheet" href="{{asset('sab_view_item_css/texts_form.css')}}">
</head>

{{-- ブートストラップにより全てのクラス名に関して変更不可 --}}

<div class="form-group">
    <h2>{{$tagged_value}}</h2>

    <table>
        <tr>
            <td>
                <label class="control-label">{{$label_value1}}</label>
                <input class="form-control" type="text" name={{$input_name1}} value ="{{old($input_name1)}}">
            </td>
            <td>
                <label class="control-label">{{$label_value2}}</label>
                <input class="form-control" type="text" name={{$input_name2}} value ="{{old($input_name2)}}">
            </td>
        </tr>
        <tr>
            <td>
                <label class="control-label">{{$label_value3}}</label>
                <input class="form-control" type="text" name={{$input_name3}} value ="{{old($input_name3)}}" >
            </td>
            <td>
                <label class="control-label">{{$label_value4}}</label>
                <input class="form-control" type="text" name={{$input_name4}} value ="{{old($input_name4)}}">
            </td>
        </tr>

    </table>
</div>
{{-- 使用例・使用方法 --}}
{{-- 4箇所入力テキスト(タグ付き) --}}
{{--     @include('sab_view_item.texts_four_tagged',
                  ['tagged_value'=>'患者名登録',
                   'label_value1'=>'姓(漢字)',
                   'label_value2'=>'名(漢字)',
                   'label_value3'=>'姓(カタカナ)',
                   'label_value4'=>'名(カタカナ)',
                   'input_name1'=>'kanji_last_name',
                   'input_name2'=>'kanji_name',
                   'input_name3'=>'kata_last_name',
                   'input_name4'=>'kata_name']) --}}