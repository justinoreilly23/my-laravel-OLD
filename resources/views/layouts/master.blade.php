<!doctype html>
<html lang="en" >
<head >

  <!-- Required meta tags -->
  <meta charset="utf-8" >
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >

  <!-- My CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}" >

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" >

  <link rel="stylesheet" href="{{asset('css/bulma.css')}}" >

  <!-- Font Awesome -->
  <link rel="stylesheet"
        href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
        crossorigin="anonymous" >

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet" >

  <meta charset="utf-8" >
  <meta http-equiv="X-UA-Compatible" content="IE=edge" >
  <meta name="viewport" content="width=device-width, initial-scale=1" >
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="" >
  <meta name="author" content="" >
  <link rel="icon" href="../../favicon.ico" >

  <!-- Bootstrap core CSS -->
  <link href="../../dist/css/bootstrap.min.css" rel="stylesheet" >

  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet" >

  <!-- Custom styles for this template -->
  <link href="navbar.css" rel="stylesheet" >

  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js" ></script >
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js" ></script >

  <title >

    @php

      $uri = "$_SERVER[REQUEST_URI]";

      switch ($uri)
      {
        case strpos($uri, "project") == true :
          echo "Projects";
        break;

        case strpos($uri, "about") == true :
          echo "About";
        break;

        case strpos($uri, "contact") == true :
          echo "Contact";
        break;

        case strpos($uri, "login") == true :
          echo "Login";
        break;

        case strpos($uri, "register") == true :
          echo "Register";
        break;

        default : echo "Home";
      }

    echo " | Ethereal";

    @endphp

  </title >

</head >
<body class="theme-{{ $theme }}" >

@if(auth()->id() == 1 && auth()->check())
    @include('partials.admin')
@endif

@include('partials.header')

@hassection('content')
  <div class="mt-3 jumbotron container-fluid theme content-theme-{{ $theme }}" >
    @yield('content')
  </div >
@endif

@include('partials.footer')

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous" ></script >
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous" ></script >
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous" ></script >
</body >
</html >