<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">



        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('index_css/style.css')}}">

        <title>予約アプリ 管理者index</title>

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
                                <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
                                        </li>
                                        <!--
                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                        -->

                                    @else
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::guard('admin')->user()->name }}  
                                                <span class="caret"></span>
                                            </a>
                                            
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item"
                                                href="{{ route('admin.logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    ログアウト
                                                </a>
                                                
                                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                </form>
                                            </div>
                                        </li>
                                    @endguest
                                </ul>
                            </div>
                    </div>
                </nav>
            </div>

            </header>

         
        <main>
        <h1 class = "pageTitle">○○医院<br>予約フォーム</h1>
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
                            <li>生年月日</li>
                            <li><input type="text" name="patient-pass"></li>
                        </ul>
                    </div>
                    <br>
                    <div class="switch">
                        <input type="submit" value="ログイン">
                        <input type="submit" value="初めての来院の方">
                    </div>
                </section>
            </form><!--終了　患者のカテゴリー　終了-->


            <form action="/index/hospital_menu" method="POST" name="hospital-menu"><!--病院のカテゴリー-->
            {{csrf_field()}}
                <section class="hospital">
                    
                    <button type="submit" class="btn btn-primary btn-danger btn-lg disabled" onclick="location.href=/index/hospital_menu">
                        病院管理者画面へ
                    </button>
                   
                </section><!--病院のカテゴリー終わり-->
            </form>
        </main>
    </div><!--body全体のclassをラッパー終わり-->
    </body>
</html>











