<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>予約アプリ　ログイン</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset
      ('index_css/style.css')}}">


    <title>予約アプリ index</title>

    <!--適用したらアウトライン生成-->
    <!--<style>
    *{
      outline: 1px solid #ff0000;
    }
    
      </style>-->

<!-- バリデーション時のレイアウト-->
<style type="text/css">

.errors {
    width: 500px;
    font-size: 20px;
    color: #e95353;
    border: 1px solid #e95353;
    background-color: #f2dede;
    align:center;
    margin:0 auto
}

</style>
  </head>
  
  <body>
  <div class="wrapper"><!--body全体のclassをラッパーとする-->


      <header>
      <body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="https://www.google.com/?hl=ja">
                    ○○医院トップページ
                </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->

                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">  <!-- -->
                        <!-- Authentication Links -->

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>

                            @if (Route::has('register'))
                               
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::guard('user')->user()->name }}  <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        ログアウト
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

      </header>
      
      <main>
      <h1 class = "pageTitle">○○医院<br>予約フォーム</h1>
      <!--患者のカテゴリー-->
      
          <section class="patient">
          @if($errors->any())
          <div class = "errors">
              <ul>
          @foreach($errors->all() as $error)
                  <li>{{$error}}</li>
          @endforeach
              </ul>
          </div>
          @endif

          <div class = "errors">
              {{ session('result') }}
          </div>
          
          <form action="/index/mypage_menu" method="POST" name="patient-data">
          {{csrf_field()}}
              <div class="id">
                  <ul>
                      <li>患者ID</li>
                      <li><input type="number" name="search_pt_id"></li>
                  </ul>
              </div>

              <div class="pass">
                  <ul>
                      <li>患者パスワード</li>
                      <li><input type="text" name="patient_pass"></li>
                  </ul>
              </div>
              
              <br>

              <div class="switch">
                  <input type="submit" value="マイページへ">
                  <!-- <input type="submit" value="初めての来院の方"> -->
              </div>          
          </form><!--終了　患者のカテゴリー　終了-->
      </section>

      </main>

      <footer><!--ここからフッターだよ-->


      </footer><!--ここでフッター終わり-->

  </div><!--body全体のclassをラッパー終わり-->
  </body><!--ここで本文終わりだよ-->

</html><!--ここでhtmlが終わるよ-->











