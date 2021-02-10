<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        @if (Auth::guard('admin')->check())
        <a class="navbar-brand" href="javascript:;">Dashboard</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          @if (count($getWarungNotActive) >= 1)
          <li class="nav-item dropdown">
            <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">notifications</i>
              {{-- <span class="notification">{{count($getWarungNotActive)}}</span> --}}
              <p class="d-lg-none d-md-block">
                Some Actions
              </p>
            </a>
             @foreach ($getWarungNotActive as $index => $warung)
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="{{route('admin.manage.warung-activation')}}"><b>{{$index + 1}}{{$warung->nama_warung}}</b>&nbsp;You have a new Warung.</a>
            </div>
            @endforeach
            @else
            <li class="nav-item dropdown">
            <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">notifications</i>
              <p class="d-lg-none d-md-block">
                Some Actions
              </p>
            </a>
              <!-- TEST -->
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" style="color:grey">Tidak pembaruan ada notifikasi</a>
            </div>
            @endif
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">person</i>
              <p class="d-lg-none d-md-block">
                Account
              </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
              <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
             @elseif(Auth::guard('warung')->check())
             <a class="navbar-brand" href="javascript:;">Dashboard Warung</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">person</i>
              <p class="d-lg-none d-md-block">
                Account
              </p>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
              <a class="dropdown-item" href="{{route('show.profile',AUTH::user()->id)}}">{{Auth::user()->nama}}</a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#modalSet">Pengaturan</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </li>
        </ul>
      </div>
    </div>
    @endif
</nav>
<!-- modal -->
  <!-- The Modal -->
<div class="modal" id="modalSet">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Pengaturan Akun</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <h4>Ubah Kata Sandi & Nama Akun</h4>
        <form method="POST" action="{{route('update.profile.action',AUTH::user()->id)}}">
          @csrf
          @method('PUT')
        <label>Nama Akun anda ({{Auth::user()->nama}})</label>
        <input type="text" name="nama" class="form-control">
        <input type="submit" name="UpdateNama" value="Ubah Nama" class="btn btn-primary"><br>
        <label>Masukkan Password Lama</label>
        <input type="password" name="password" class="form-control">
        <label>Masukkan Password Baru</label>
        <input type="password" name="test" class="form-control">
        <input type="submit" name="UpdatePassword" value="Ubah Password" class="btn btn-primary">
      </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>
 