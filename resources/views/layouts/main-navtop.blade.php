<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: rgba(); position: absolute;">
    <div class="container">
      <a class="navbar-brand proxi" href="/" style="color:black">Kios.Ku</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link proxi" style="color:black" href="{{route('cari')}}">cari produk</a>
        </li>
        @guest
        <li class="nav-item">
          <a class="nav-link proxi" style="color:black" href="{{route('register')}}">daftar</a>
        </li>
        <li class="nav-item">
          {{-- pake modal --}}
          {{-- <a class="nav-link proxi" style="color:#b4F5FF" href="#" data-toggle="modal" data-target="#myModal">login</a>  --}}
          {{-- !pake modal --}}
          <a class="nav-link proxi" style="color:#b4F5FF" href="/login">login</a>
        </li>
        @endguest
        @auth
        <li class="nav-item">
          <a class="nav-link proxi" style="color:#b4F5FF" href="{{route('home')}}">home</a>
        </li>
        @endauth
      </ul>
    </div>
  </nav>
  