@extends('user.home')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>    
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Edit Profil</h4>
      </div>
      <div class="card-body">
        <form action="/profile/{{$akun['id']}}" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-12">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{$akun['nama']}}">
              </div>
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary pull-right">Simpan</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Ubah Password</h4>
      </div>
      <div class="card-body">
        <form action="/profile/{{$akun['id']}}/edit" method="POST">
        @csrf
        <div class="form-group row">
            <div class="col-sm-10">
              <label class="bmd-label-floating">Password Lama</label>
              <input type="password" class="form-control" name="passwordLama" id="inputPassword">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
              <label class="bmd-label-floating">Password Baru</label>
              <input type="password" class="form-control" name="passwordBaru" id="inputPassword">
            </div>
        </div>
        <button class="btn btn-primary">Simpan</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
@endsection