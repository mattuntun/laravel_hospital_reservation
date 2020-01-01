<head>

  <link rel="stylesheet" href="{{asset('sab_view_item_css/footer.css')}}">

</head>

<footer>
  <section class="anything-top"><!--各ボタン-->
  <table class="footer-table">
      <tr>
        <td>
          <button type="button" class="btn btn-outline-info" onclick="location.href='/index'">ログイン画面へ</button>
        </td>
        <td>
          <button type="button" class="btn btn-outline-info" onclick="location.href='/index'">医療機関HPトップ</button></a>
        </td>
      </tr>
      <tr>
        <td>
          <button type="button" class="btn btn-outline-info" onclick="location.href='/index'">予約情報ダウンロード</button>
        </td>
        <td>
            <form action="/index/mypage_menu" method =post>
            {{csrf_field()}}
            <input type="hidden" name ="search_pt_id" value="{{$serach_pt_id}}">
            <button type="submit" class="btn btn-outline-info" onclick="location.href='/index/mypage_menu'">マイページトップへ</button>
            </form>
          </td>
      </tr>
    </table>
  </section>
</footer>

{{--
  @include('sab_view_item.my_page_footer',
                  ['footerbuttom1'=>'ログイン画面へ',
                  'footerbuttom2'=>'医療機関HPトップ',
                  'footerbuttom3'=>'予約情報ダウンロード',
                  
                  'footerbuttom_access1'=>'/index',
                  'footerbuttom_access2'=>'/index',
                  'footerbuttom_access3'=>'/index',
                  
                  'footerbuttom4'=>'予約情報ダウンロード',
                  'form_footerbuttom_access4'=>'予約情報ダウンロード',
                  'footerbuttom_access4'=>'予約情報ダウンロード',
                  'input_name4'=>'予約情報ダウンロード',
                  'input_value4'=>'予約情報ダウンロード',])
                  
                  --}}




