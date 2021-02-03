@extends('user.home')

@section('content')
    <div class="col-md-4">
        <div class="card card-profile">
          <div class="card-avatar">
            <a href="javascript:;">
              <img class="img" src="{{asset('img/logo.png')}}">
            </a>
          </div>
          <div class="card-body">
            <h6 class="card-category text-gray">Pemilik Warung</h6>
            <h4 class="card-title">{{$akun['nama']}}</h4>
            <a href="/profile/{{$akun['id']}}/edit" class="btn btn-primary btn-round">Edit Profil</a>
          </div>
        </div>
      </div>
@endsection