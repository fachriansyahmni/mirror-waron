<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Kios.Ku | Dashboard</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="{{ asset('css/landing-page.min.css') }}" rel="stylesheet">
  @if(Auth::guard('admin')->check())
<script type="text/javascript">
    window.location = "{{ url('/admin') }}";//here double curly bracket
</script>
@elseif(Auth::guard('teacher')->check())
<script type="text/javascript">
    window.location = "{{ url('/teacher') }}";//here double curly bracket
</script>
@else
<script type="text/javascript">
    window.location = "{{ url('/siswa') }}";//here double curly bracket
</script>
@endif
</head>
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
</style>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: rgba(); position: absolute;">
    <div class="container">
      <a class="navbar-brand proxi" href="#" style="color:black">Kios.Ku</a>
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link proxi" style="color:black" href="#">cari produk</a>
      </li>
      <li class="nav-item">
        <a class="nav-link proxi" style="color:black" href="#">daftar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link proxi" style="color:#b4F5FF" href="#" data-toggle="modal" data-target="#myModal">login</a>
      </li>
    </ul>
    </div>
  </nav>
  <!-- Modal -->
  <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Login ~ Penjual (Pemilik Warung)</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="#" method="POST" class="form-group">
           Email :
           <input type="text" name="email" placeholder="Masukkan Alamat Email" class="form-control"><br>
           Password :
           <input type="password" name="password" placeholder="Masukkan Password" class="form-control">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <a class="btn btn-primary" href="dash_penjual.html">Login</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

  <!-- Masthead -->
  <header class="masthead text-black text-right">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 ml-auto">
          <h1 style="font-size: 72px; font-weight: 600;" class="mb-5 proxi">CARI <span style="color:#b4F5FF">WARUNG</span><br>DISEKITARMU</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 ml-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0 ml-auto">
                <input type="email" style="border-radius: 40px;" class="form-control form-control-lg" placeholder="Cari warung atau produk didekatmu...">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <img src="{{ asset('img/package.svg') }}" class="m-auto" style="fill:#b4F5FF; width:55px; height: 55px;">
            </div>
            <h3>Produk</h3>
            <p class="lead mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
               <img src="{{ asset('img/package.svg') }}" class="m-auto" style="fill:#b4F5FF; width:55px; height: 55px;">
            </div>
            <h3>Harga</h3>
            <p class="lead mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <img src="{{ asset('img/package.svg') }}" class="m-auto" style="fill:#b4F5FF; width:55px; height: 55px;">
            </div>
            <h3>Stok</h3>
            <p class="lead mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- List Jenis Warung -->
  <br>
  <div class="container">
      <center>
          <h1 class="proxi">JENIS WARUNG</h1>
          <br>
          <div class="row" style="margin-left: 50px;">
            <a href="#" style="color:black" onclick="alert('Astagfirullah :V')"><div class="card" style="width:250px; height:300px; background-color:#b4F5FF; border-radius: 20px;">
            <br><br>
            <center><img class="card-img-top" src="{{ asset('img/coffee-cup.svg') }}" alt="Card image" style="width:130px; height: 130px;"></center>
          <div class="card-body">
              <h5 class="card-title proxi">WARUNG KOPI</h5>
          </div>
      </div></a>
      <br>
      </center>
  </div>
  <br>
  <center>
    <a href="#" class="proxi" style="color:black"><u>Tampilkan lebih banyak</u></a>
  </center>
  <br>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; Kalong Coders 2020. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
