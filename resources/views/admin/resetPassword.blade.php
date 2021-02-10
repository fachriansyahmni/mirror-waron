@extends('dashboard-layouts.d_master')

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



    <form action="/admin/1/reset" method="POST">
        @csrf
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password Lama</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="passwordLama" id="inputPassword">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password Baru</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="passwordBaru" id="inputPassword">
            </div>
        </div>
        <button class="btn btn-success">Simpan</button>
    </form>
@endsection