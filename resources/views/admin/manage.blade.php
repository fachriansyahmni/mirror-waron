@extends('dashboard-layouts.d_master')


@section('content')
<h2>Manage Warung</h2>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Total Warung Aktif</p>
                  <h3 class="card-title">{{count($getAllWarung)}}</h3>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
            @if (count($getWarungNotActive)>0)
            <div class="col-lg-12">
              <div class="alert alert-warning d-flex justify-content-between align-items-center" role="alert">
                <h4 class="text-dark font-weight-bold">
                  {{count($getWarungNotActive)}} warung waiting for activation
                </h4>
                <a href="{{route('admin.manage.warung-activation')}}" class="btn btn-danger">check</a>
              </div>
            </div>
            @endif
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">List Warung</h4>
                  <p class="card-category"> Here is a all user of warung</p>
                  <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#newWarungModal">add a new warung</button>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="text-primary">
                        <th>NO</th>
                        <th>Warung</th>
                        {{-- <th>City</th>
                        <th>Districts</th>
                        <th>Province</th> --}}
                        <th>Options</th>
                      </thead>
                      <tbody>
                        @foreach ($getAllWarung as $index => $warung)
                        <tr>
                          <td>
                            {{$index + 1}}
                          </td>
                          <td>
                            <b>{{$warung->nama_warung}}</b>
                          </td>
                          {{-- <td>-</td>
                          <td>-</td>
                          <td>-</td> --}}
                          <td> 
                              <button class="btn btn-info">details</button>
                              <a href="#" class="btn btn-success">Manage</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection

@section('modal-content')
<div class="modal fade" id="newWarungModal" tabindex="-1" role="dialog" aria-labelledby="newWarungModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newWarungModalLabel">Add a New Warung</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="n_name_warung">Name For Warung</label>
            <input id="n_name_warung" type="text" name="n_name_warung" class="form-control" value="{{old('n_name_warung')}}" required>
          </div>
          <div class="form-group">
            <label for="n_owner">Owner</label>
            <select name="n_owner" class="form-control" id="n_owner" required>
              <option value="1">ahmad</option>
            </select>
          </div>
          <div class="form-row">
            <div class="col">
              <label for="">Provinsi</label>
              @php
                  $urlDataProvinsi = "https://dev.farizdotid.com/api/daerahindonesia/provinsi"; //ambil semua data provinsi
                  $getDataProvinsi = json_decode(file_get_contents($urlDataProvinsi), true);
                  // dd($getDataProvinsi);
              @endphp
              <select name="prov" class="form-control">
                  @foreach ($getDataProvinsi["provinsi"] as $index => $provinsi)
                      <option value="{{$provinsi["id"]}}">{{$provinsi['nama']}}</option>
                  @endforeach
              </select>
            </div>
            <div class="col">
              <label for="">Kabupaten/Kota</label>

            </div>
          </div>
          <div class="form-group">
            <label for="n_address">address</label>
            <textarea name="n_address" id="" class="form-control" rows="10">{{old('n_address')}}</textarea>
          </div>
          <button class="btn btn-success" name="submit_new_warung" type="submit">add</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
    <script>
        $('select[name="prov"]').on('change', function() {
            $.ajax({
                url:"https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi="+this.value,
                type: "GET",
                contentType: 'application/json; charset=utf-8',
                success: function(resultData) {
                    data = JSON.stringify(resultData.kota_kabupaten);
                    $('.asd').html(JSON.stringify(resultData.kota_kabupaten));
                },
                error : function(jqXHR, textStatus, errorThrown) {
                },

                timeout: 120000,
            })
        });
    </script>
@endpush