<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/svg" href="{{ asset('img/shop.svg') }}">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Kios.Ku</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/landing-page.min.css') }}" rel="stylesheet">

  <style>
    @font-face {
           font-family: "Font Proxi";
           src: url({{ asset('vendor/font/ProximaNovaAlt-Bold.otf')}});
           }
  
     .proxi {
           font-family: "Font Proxi";
           }
     .package {
         fill: #b4F5FF;
     }
      @media only screen and (max-width:620px) {
        /* For mobile phones: */
      }
  </style>
  @stack('css')
</head>

<body>
    @include('layouts.main-navtop')
    @yield('content')
    @include('layouts.main-footer')

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>
</html>