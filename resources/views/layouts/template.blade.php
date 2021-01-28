<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('template/login/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('template/login/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('template/login/css/bootstrap.min.css') }}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('template/login/css/style.css') }}">

    <title>Kios.Ku</title>
  </head>
  <body>
  

  <div class="d-md-flex half">
    <div class="bg" style="background-color: #b4F5FF;"></div>
      <div class="contents">
      @yield('content')
      
      </div>
    </div>  
  </div>
    

    <script src="{{ asset('template/login/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('template/login/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/login/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/login/js/main.js') }}"></script>
  </body>
</html>
