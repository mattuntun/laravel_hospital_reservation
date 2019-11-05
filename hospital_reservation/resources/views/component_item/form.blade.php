<form method="POST" action={{$form_action}} name={{$form_name}}>
{{ csrf_field() }}

@isset($form_item1)
<p>{{$form_item1}}</p>
@endisset


@isset($form_item2)
<p>{{$form_item2}}</p>
@endisset


@isset($form_item3)
<p>{{$form_item3}}</p>
@endisset


@isset($form_item4)
<p>{{$form_item4}}</p>
@endisset


@isset($form_item5)
<p>{{$form_item5}}</p>
@endisset


@isset($form_item6)
<p>{{$form_item6}}</p>
@endisset


@isset($form_item7)
<p>{{$form_item7}}</p>
@endisset


@isset($form_item8)
<p>{{$form_item8}}</p>
@endisset


@isset($form_item9)
<p>{{$form_item9}}</p>
@endisset


@isset($form_item10)
<p>{{$form_item10}}</p>
@endisset


</form>  

{{-- 使用例・使用方法 --}}
{{-- このコンポーネントはformとしての囲い(メソッドはpost) --}}
{{--     @component('component_item.form')
                 @slot('form_action')
                 pt_Confirmation/pt_Confirmation_page.php
                 @endslot

                 @slot('form_item1')

                 @endslot

                 @slot('form_name')
                 nyuuryoku
                 @endslot
         @endcomponent --}}
