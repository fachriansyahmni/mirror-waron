@extends('dashboard-layouts.d_master')

@push('add-js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
@endpush
@section('content')
<div class="container-fluid">
  
  
    <div class="row">
    <div class="col-lg-6 col-md-12">
      <a href="/" class="btn btn-primary">Ubah Password</a>
      <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <span class="nav-tabs-title"></span>
              <ul class="nav nav-tabs" data-tabs="tabs">
                <li class="nav-item">
                  <h4 class="card-title">Notifikasi</h4>
                    <div class="ripple-container"></div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active" id="profile">
              <table class="table">
                <tbody>
                  <tr>
                    <td>
                      <b><i class="material-icons">notifications</i></b>
                    </td>
                    <td>Kamu punya <b> {{count($getWarungNotActive)}} </b> Warung baru untuk di konfirmasi, harap cek tombol <b>lihat</b> untuk di konfirmasi.</td>
                    <td class="td-actions text-right">
                      <a href="{{route('admin.manage.warung-activation')}}" class="btn btn-primary"><i class="fa fa-eye"></i> Lihat</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-12">
      <div class="card">
        <div class="card-header card-header-warning">
          <h4 class="card-title">Data Persebaran Warung</h4>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
            <thead class="text-warning">
              <th>No</th>
              <th>Kota</th>
              <th>Jumlah Warung</th>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Bandung</td>
                <td>2</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Bekasi</td>
                <td>1</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Bogor</td>
                <td>1</td>
              </tr>
              <tr>
                <td>4</td>
                <td>Kebumen</td>
                <td>1</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
