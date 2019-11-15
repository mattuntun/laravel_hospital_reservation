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











