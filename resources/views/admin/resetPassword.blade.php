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

    <div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Password</h4>
          </div>
          <div class="card-body">
            <form action="/admin/1/reset" method="POST">
                @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Password Lama</label>
                    <input type="password" class="form-control" name="passwordLama">
                  </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group bmd-form-group">
                      <label class="bmd-label-floating">Password Baru</label>
                      <input type="password" class="form-control" name="passwordBaru">
                    </div>
                  </div>
              </div>
    
              <button type="submit" class="btn btn-primary pull-right">Simpan</button>
              <div class="clearfix"></div>
            </form>
          </div>
@endsection