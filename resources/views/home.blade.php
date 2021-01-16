@extends('layouts.main-layout')

@push('css')
<style>
   .search-m{
    display: none;
   }
   .warung-landing{
     display: flex;
     height: 100vh;
     background: url("{{asset('img/pop1.png')}}") no-repeat;
     background-size: 70vw;
     align-items: center;
     place-content: center;
     justify-content: space-around;
    }
    .warung-landing .warung-search h1{
      font-size: 5vw; 
    }
    .warung-landing .warung-search{
      margin-left: 40px;
    }
    .warung-icon{
      height: 100%;
      width: 100%;
      max-width: 350px;
      max-height: 350px;
      background: url("{{asset('img/shop.png')}}") no-repeat;
      background-size:  contain;
      background-position-y: center;
    }
    input.search[type="text"] {
        /* width: 200px;
        height: 20px; */
        padding-right: calc(100%-60px);
    }

    input.submitsearch[type="submit"] {
        margin-left: -60px;
        height: 30px;
        margin-top: 10px;
    }
    
    @media only screen and (max-width:620px) {
      /* For mobile phones: */
      .search-d {
        display: none;
      }
      .search-m {
        display: inherit;
      }
      .warung-landing{
        display: inherit;
        text-align: -webkit-center;
      }
      .warung-landing .warung-icon{
        padding-top: 50vh;
        max-width: 150px;
        max-height: 150px;
      }
      .warung-landing .warung-search{
        margin:0;
      }
      .warung-landing .warung-search h1{
        font-size: 10vw;
      }
    }
</style>
    
@endpush
{{-- <body> --}}

  <!-- Masthead -->
  {{-- <header class="masthead text-black text-right">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 ml-auto">
          <h1 style="font-size: 72px; font-weight: 600;" class="mb-5 proxi">CARI <span style="color:#b4F5FF">WARUNG</span><br>DISEKITARMU</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 ml-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0 ml-auto">
                <input type="text" style="border-radius: 40px;" class="form-control form-control-lg" placeholder="Cari warung atau produk didekatmu...">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header> --}}

@section('content')
  <header class="container-fluid warung-landing">
    <div class="warung-icon"></div>
    <div class="warung-search">
      <h1 style="font-weight: 600;" class="mb-5 proxi">CARI <span style="color:#b4F5FF">WARUNG</span><br>DISEKITARMU</h1>
        <div class="text-center">
          <form method="POST" action="{{route('cari')}}" class="search-m">
            @csrf
            <input type="text" class="form-control" name="search" id="">
            <button class="btn btn-block btn-info" type="submit">cari</button>
          </form>
          <form method="POST" action="{{route('cari')}}" class="search-d">
            @csrf
            <div class="input-group">
              <input type="text" style="border-radius: 40px; z-index: inherit;" name="search" class="form-control form-control-lg search" placeholder="Cari warung atau produk didekatmu...">
              <div class="input-group-append">
                <input type="submit" style="border-radius: 20px;" class="submitsearch btn btn-sm btn-info">
              </div>
            </div>
          </form>
        </div>
    </div>
  </header>
  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <img src="{{ asset('img/package.svg') }}" class="m-auto" style="fill:#b4F5FF; width:55px; height: 55px;">
            </div>
            <h3>Produk</h3>
            <p class="lead mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <img src="{{ asset('img/package.svg') }}" class="m-auto" style="fill:#b4F5FF; width:55px; height: 55px;">
            </div>
            <h3>Harga</h3>
            <p class="lead mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<p>
          </div>
        </div>
        <div class="col-lg-4 col-md-4">
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



  @guest
  <!-- Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <form method="POST" action="{{ route('login') }}">
        <div class="modal-body">
            @csrf
            Username
            <input type="text" name="username" value="{{ old('username') }}" required class="form-control  @error('username') is-invalid @enderror"><br>
            Password :
            <input type="password" name="password"  value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" required>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-primary" type="submit">Login</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  @endguest
@endsection
