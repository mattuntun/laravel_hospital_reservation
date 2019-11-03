<!DOCTYPE html><!--このサイトはhtmlだよ-->
<html lang="ja"><!--ここからhtmlが始まるよ-->
  <head><!--このサイトの設定だよ-->
    <meta charset="utf-8"><!--このサイトの構成文字はutf-8だよ-->
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   
      <link rel="stylesheet" href="{{asset('hospital_index_css/style.css')}}"><!--ファビコン(サイトのバーの画像)の種類(拡張子)と場所　　　　　入力！！！！-->
    <meta name="description" content="予約アプリ"><!--descriptionは概要・説明の事 その後に説明文を入れてあげる　　入力！！！！-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script language="JavaScript">
      
        function check() {
            if(document.nyuuryoku.pt_id.value == "") {
                alert("IDを入力してください");
                return false;
            }
            if(document.nyuuryoku.kanji_last_name.value == "") {
                alert("名前を入力してください");
                return false;
            }
            if(document.nyuuryoku.kanji_name.value == "") {
                alert("名前を入力してください");
                return false;
            }
            if(document.nyuuryoku.kata_last_name.value == "") {
                alert("名前を入力してください");
                return false;
            }
            if(document.nyuuryoku.kata_name.value == "") {
                alert("名前を入力してください");
                return false;
            }
            if(document.nyuuryoku.birthday.value == "") {
                alert("生年月日を入力してください");
                return false;
            }
            if(document.nyuuryoku.mail_address.value == "") {
                alert("メールアドレスを入力して下さい");
                return false;
            }
           
        }
       
      </script>


    
    <title>新規患者登録</title><!--サイトのバータイトルを　　　　　　　　　　　　入力！！！-->
    <!--<style>
    *{
      outline: 1px solid #ff0000;
    }
    </style>-->
  </head><!--ここで設定終了-->
  
  <body><!--ここから本文が始まるよ-->
  <div class="wrapper"><!--body全体のclassをラッパーとする-->
    
    <header><!--ここからヘッダー始まるよ-->
      <br>
      <h1>新規患者登録</h1>    

    </header><!--ここでヘッダー終わり-->
  <br>
  <br>
  <br><!--ヘッダーとメインの間のスペース-->
  <br>
  <br>
  
    <main>
      <form method="POST" action="pt_Confirmation/pt_Confirmation_page.php" name="nyuuryoku" onsubmit="return check()">
        <section class="new-patient-registration"><!--開始　new-patient-registration　開始-->
          <div class="form-group">
            <label class="control-label" id="new-patient-registration">患者ID登録</label>
            <input class="form-control" id="new-patient-registration" type="text" name="pt_id">
          </div>

          <br>
          <br>

          <div class="form-group">
            <h2>患者名登録</h2>

            <table>
              <tr>
                <td>
                  <label class="control-label">姓(漢字)</label>
                  <input class="form-control" type="text" name="kanji_last_name">
                </td>
                <td>
                  <label class="control-label">名(漢字)</label>
                  <input class="form-control" type="text" name="kanji_name">
                </td>
              </tr>
              <tr>
              <td>
                  <label class="control-label">姓(カタカナ)</label>
                  <input class="form-control" type="text" name="kata_last_name">
                </td>
                <td>
                  <label class="control-label">名(カタカナ)</label>
                  <input class="form-control" type="text" name="kata_name">
                </td>
              </tr>
              
            </table>
          </div>
          <div class="form-group">
            <h2>生年月日・性別・アドレス登録</h2>
              <table>
                  <tr>
                    <td>
                      <label class="control-label">生年月日</label>
                      <input class="form-control" type="text" name="birthday">
                    </td>
                    <td>
                        <label class="control-label">メールアドレス</label>
                        <input class="form-control" type="text" name="mail_address">
                       </td>
                    </td>
                  </tr>
                  <tr>
                    <td> 
                        <label class="control-label">性別</label>
                        <select name="sex" class="form-control">
                            <option value="man" class="form-control">男</option>
                            <option value="woman" class="form-control">女</option>
                        </select>
                      
                  </tr>
                </table>
            </div>
            
            <div class="apply">
              <h2>内容を確認して情報を登録</h2>
              
                <button type="submit" class="btn btn-primary btn-danger btn-lg disabled" onclick="location.href='pt_Confirmation/pt_Confirmation_page.php'">
                  内容を登録
                </button>
             </div>
             
         </section><!--終了　new-patient-registration　終了-->
      </form>  
    </main>

      <footer><!--フッターだよ-->
        <section class="anything-top"><!--各ボタン-->
          <table>
            <tr>
              <td>
                <a href="../../hospital top.html"><button type="button" class="btn btn-outline-info">設定画面トップ</button></a>
              </td>
              <td>
                  <button type="button" class="btn btn-outline-info">医療機関HPトップ</button>
              </td>
            </tr>
            <tr>
             <td>
                <a href="../../../reservation top .html"><button type="button" class="btn btn-outline-info">ログイン画面へ</button></a>
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











