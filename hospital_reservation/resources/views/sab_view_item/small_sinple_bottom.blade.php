<head>

  <link rel="stylesheet" href="{{asset('sab_view_item_css/large_bottom.css')}}">

</head>

<button type="submit" class="btn btn-primary btn-danger btn-lg disabled" onclick="location.href={{$bottom_access}}">
    内容を登録
</button>
{{-- 使用例・使用方法 --}}
{{-- タグ無ボタン(スモール) --}}
{{--     @include('sab_view_item.small_sinple_bottom',
                  ['bottom_value'=>'内容を登録',
                   'bottom_access'=>'pt_Confirmation/pt_Confirmation_page.php']) --}}