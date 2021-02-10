@extends('dashboard-layouts.d_master')

@section('link profile')
    "/profile/1/show"
@endsection

@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Ayo buat warungmu sendiri</h5>
      <p class="card-text">
      </p>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Tutorial</button>
    </div>
  </div>

  <!-- modal -->
  <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"># Tutorial Membuat Toko/Warungmu sendiri di Kios.Ku</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <img src="{{ asset('img/bg-modal.jpg') }}">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>
@endsection