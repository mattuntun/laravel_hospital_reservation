<head>
    <link rel="stylesheet" href="{{asset('sab_view_item_css/large_buttom.css')}}">
</head>

<h2>{{$tagged_value}}</h2>

<button type="submit" class="btn btn-primary btn-danger btn-lg disabled" onclick="location.href={{$buttom_access}}">
    {{$buttom_value}}
</button>

{{-- 使用例・使用方法 --}}
{{-- タグ付ボタン(スモール) --}}
{{--     @include('sab_view_item.small_tagged_buttom',
                  ['tagged_value'=>'内容を確認して情報と登録',
                   'buttom_value'=>'内容を登録',
                   'buttom_access'=>'pt_Confirmation/pt_Confirmation_page.php']) --}}