<head>

  <link rel="stylesheet" href="{{asset('sab_view_item_css/header.css')}}">

</head>

<header>
  <br> <h1>{{$main_theme}}</h1>

          @isset($sub_theme)
              <h2>{{$sub_theme}}</h2>
          @endisset

</header>




