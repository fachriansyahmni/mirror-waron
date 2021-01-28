@extends('dashboard-layouts.d_master')

@section('content')
<div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">Edit Category</h4>
      </div>
      <div class="card-body">
        <form action="/admin/mancat/{{$category['id']}}" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-12">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Category</label>
                <input type="text" class="form-control" name="kategori" value="{{$category["kategori"]}}">
              </div>
            </div>
          </div>
          
          <button type="submit" class="btn btn-primary pull-right">Update Category</button>
          <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
@endsection