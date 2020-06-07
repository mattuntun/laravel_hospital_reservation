<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">

    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{asset
      ('index_css/style.css')}}">
    <title>予約アプリ index</title>

    <!--適用したらアウトライン生成-->
    <!--<style>
    *{
      outline: 1px solid #ff0000;
    }
    
      </style>-->

  </head>
  
  <body>
  <div class="wrapper"><!--body全体のclassをラッパーとする-->


      <header>
        <h1>○○医院<br>予約フォーム</h1>
      </header>
      
      <main>
        <form action="/index/mypage_menu" method="POST" name="patient-data"><!--患者のカテゴリー-->
        {{csrf_field()}}
          <section class="patient">
            <div class="id">
              <ul>
                <li>患者ID</li>
                <li><input type="number" name="search_pt_id"></li>
              </ul>
            </div>

            <div class="pass">
              <ul>
                <li>パスワード</li>
                <li><input type="text" name="patient-pass"></li>
              </ul>
            </div>

            <div class="switch">
              <input type="submit" value="ログイン">
              <!-- <input type="submit" value="初めての来院の方"> -->
            </div>
          </section>
        </form><!--終了　患者のカテゴリー　終了-->


        <form action="/index/hospital_menu" method="POST" name="hospital-menu"><!--病院のカテゴリー-->
        {{csrf_field()}}
          <section class="hospital">
            <div class="adm-id"><!--病院のID入力欄-->
              <ul>
                <li class="adm-id-name">管理者ID</li>
                <li><input type="text" name="id-number" class="input-id-number"></li>
              </ul>
            </div>
            <div class="adm-pass"><!--病院のPASS入力欄-->
              <ul>
                <li class="adm-pass-name">パスワード</li>
                <li><input type="text" name="password" class="input-pass-number"></li>
              </ul>
            </div>
            <div class="switch">
              <input type="submit" value="ログイン">
            </div>
           </section><!--病院のカテゴリー終わり-->
        </form>



        




      </main>




      

      <section><!--本文内のカテゴリーだよ-->
        
      </section><!--本文内のカテゴリー終わり-->

      <section><!--本文内のカテゴリーだよ-->
      
      </section><!--本文内のカテゴリー終わり-->
      
      <section><!--本文内のカテゴリーだよ-->
      
      </section><!--本文内のカテゴリー終わり-->
      


      <footer><!--ここからフッターだよ-->


      </footer><!--ここでフッター終わり-->

  </div><!--body全体のclassをラッパー終わり-->
  </body><!--ここで本文終わりだよ-->

</html><!--ここでhtmlが終わるよ-->











