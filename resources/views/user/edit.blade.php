@extends('user.home')

@section('content')
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
  </div>
@endsection