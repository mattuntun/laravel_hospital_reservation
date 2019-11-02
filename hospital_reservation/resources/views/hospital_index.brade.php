<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   
      <link rel="stylesheet" href="{{asset('hospital_index_css/style.css')}}">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    
    <title>医療機関　index</title>
    <!--<style>
    *{
      outline: 1px solid #ff0000;
    }
    </style>-->
  </head>
  
  <body>
  <div class="wrapper">
    
      <header>
       <br> <h1>○○医院</h1>
      </header>
      <main>
        <section class="hospital-meta"><!--予約設定変更の入り口-->
          <br>
          <br>
           <h2><strong>設定画面</strong></h2>
           <a href="reservation_change/common_reservation_setting_screen.html"><button type="button" class="btn btn-info btn-lg btn-block">
              予約設定の変更をする
            </button></a>
        </section>



        <br>
        <br>
        <br><!--セクションとセクションの間のスペース-->
        <br>
        <br>
  


        <section class="patient-meta"><!--患者情報変更の入り口-->
          <h2><strong>患者設定</strong></h2>
       
            <button type="button" class="btn btn-info btn-lg btn-block" onClick="location.href='patient_registration_change_deletion/patient_registration_change_deletion.php'">
              新規患者登録・変更・削除
            </button>
       
            <button type="button" class="btn btn-info btn-lg btn-block" onClick="location.href='reservation_change/common_reservation_setting_screen.php'">
              患者予約情報編集
            </button>
           
        </section>
      </main>

      <footer><!--フッターだよ-->
        <section class="anything-top"><!--各ボタン-->
          <table>
            <tr>
              <td>
                <button type="button" class="btn btn-outline-info">設定画面トップ</button>
              </td>
              <td>
                <a href="../reservation_top .html"><button type="button" class="btn btn-outline-info">ログイン画面へ</button></a>
              </td>
            </tr>
            <tr>
              <td>
                <button type="button" class="btn btn-outline-info">医療機関HPトップ</button>
              </td>
              <td>
                <button type="button" class="btn btn-outline-info">予約情報ダウンロード</button>
              </td>
            </tr>
          </table>
        </section>
      </footer>
      




      

      <section><!--本文内のカテゴリーだよ-->
        
      </section><!--本文内のカテゴリー終わり-->

      <section><!--本文内のカテゴリーだよ-->
      
      </section><!--本文内のカテゴリー終わり-->
      
      <section><!--本文内のカテゴリーだよ-->
      
      </section><!--本文内のカテゴリー終わり-->
      



    </div><!--body全体のclassをラッパー終わり-->
  </body><!--ここで本文終わりだよ-->

</html><!--ここでhtmlが終わるよ-->











