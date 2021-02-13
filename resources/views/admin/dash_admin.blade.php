@extends('dashboard-layouts.d_master')

@push('add-js')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
@endpush
@section('content')
<div class="container-fluid">
  
  
    <div class="row">
    <div class="col-lg-6 col-md-12">
      <a href="/admin/reset" class="btn btn-primary">Ubah Password</a>
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
          <form method="GET">
           @php
              $urlDataProvinsi = "https://dev.farizdotid.com/api/daerahindonesia/provinsi"; //ambil semua data provinsi
              $getDataProvinsi = json_decode(file_get_contents($urlDataProvinsi), true);
           @endphp
          <select name="prov" class="form-control" onchange="this.form.submit()">
              @foreach ($getDataProvinsi["provinsi"] as $index => $provinsi)
                  <option value="{{$provinsi["id"]}}" {{old('prov') == $provinsi["id"] ? 'selected' : ""}}>{{$provinsi['nama']}}</option>
              @endforeach
          </select>
        </form>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
            Terdapat <b>{{count($getAllWarung)}}</b> Warung di provinsi ini
            <thead class="text-warning">
              <th>No</th>
              <th>Nama Warung</th>
              <th>Provinsi</th>
            </thead>
            <tbody>
              @foreach ($getAllWarung as $index => $warung)
              <tr>
                <td>{{$index + 1}}</td>
                <td>{{$warung->nama_warung}}</td>
                <td>
                  @isset($warung->nama_provinsi)
                      {{$warung->nama_provinsi}}
                  @endisset
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
