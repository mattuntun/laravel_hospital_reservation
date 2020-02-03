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
                <input class="form-control" type="text" name={{$input_name1}} value = "{{old($input_name1)}}"> 
            </td>
            <td>
                <label class="control-label">{{$label_value2}}</label>
                <input class="form-control" type="text" name={{$input_name2}} value = "{{old($input_name1)}}">
            </td>
        </tr>
        <tr>
            <td>
            <label class="control-label">{{$select_label}}</label>
                        <select name={{$select_name}} class="form-control">
                            <option value={{$option_value1}} class="form-control">{{$option_lavel1}}</option>
                            <option value={{$option_value2}} class="form-control">{{$option_lavel2}}</option>
                        </select>
            </td>
        </tr>
    </table>
</div>
{{-- 使用例・使用方法 --}}
{{-- 2箇所入力+1箇所セレクトテキスト(タグ付き) --}}
{{--     @include('sab_view_item.texts_two_select_one_tagged',
                  ['tagged_value'=>'生年月日・性別・アドレス登録',
                   'label_value1'=>'生年月日',
                   'label_value2'=>'メールアドレス',
                   'input_name1'=>'birthday',
                   'input_name2'=>'mail_address',
                   'select_label'=>'性別',
                   'select_name'=>'sex',
                   'option_lavel1'=>'男',
                   'option_lavel2'=>'女',
                   'option_value1'=>'man',
                   'option_value2'=>'woman']) --}}