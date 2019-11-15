<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   
    <link rel="stylesheet" href="{{asset('hospital_menu_css/style.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    
    <title>@yield('web_title')</title><!--サイトのバータイトルを　　　　　　　　　　　　入力！！！-->
    <!--<style>
    *{
      outline: 1px solid #ff0000;
    }
    </style>-->
  </head>
  
  <body>
  <div class="wrapper">
      @yield('header_content')

  <br>
  <br>
  <br><!--ヘッダーとメインの間のスペース-->
  <br>
  <br>
  
    <main>
    @yield('main_content')
      <section class="Reservation period"><!--Reservation period開始-->
               
        <div class="select-box"><!--セレクトボックス-->

        </div><!--セレクトボックス終わり-->
      </section><!--Reservation period終了-->


  <br>
  <br>
  <br><!--セクションとセクションの間のスペース-->
  <br>
  <br>

      <section class="reservation deadline"><!--reservation deadline開始-->
        <h2>予約の締め切り日時設定を行ってください</h2>
        
        <div class="select-box"><!--セレクトボックス-->
          <form method="post" action=""><!--データ送信設定　post⇒本文　get⇒URL　actionで送信先を指定-->
              <p>
                <!--セレクトボックスの形態 size="2"以上にするとリスト形式-->
                <!--セレクトボックスの形態 ブートストラップによってclass="form-control"で画面いっぱい-->
                <select name="カレンダー表示設定-何カ月先か-" class="form-control" size="1" style="height: 100px; font-size: 32px;">
                  <option disabled selected value>選択してください</option>
                  <option value="診察日当日より１日以内の予約不可">診察日当日より１日以内の予約不可</option>
                  <option value="診察日当日より２日以内の予約不可">診察日当日より２日以内の予約不可</option>
                  <option value="診察日当日より３日以内の予約不可">診察日当日より３日以内の予約不可</option>
                  <option value="診察日当日より４日以内の予約不可">診察日当日より４日以内の予約不可</option>
                  <option value="診察日当日より５日以内の予約不可">診察日当日より５日以内の予約不可</option>
                  <option value="診察日当日より６日以内の予約不可">診察日当日より６日以内の予約不可</option>
                  <option value="診察日当日より７日以内の予約不可">診察日当日より７日以内の予約不可</option>              
                </select>
              </p>                                          
          </form>
        </div><!--セレクトボックス終わり-->
      </section><!--reservation deadline終了-->     
    </main>
    @yield('footer_content')
  
  
  <br>
  <br>
  <br>
  <br>
  <br>


  


    </div><!--body全体のclassをラッパー終わり-->
  </body><!--ここで本文終わりだよ-->

</html><!--ここでhtmlが終わるよ-->











