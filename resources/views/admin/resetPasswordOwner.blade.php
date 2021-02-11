@extends('dashboard-layouts.d_master')

@section('content')
<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Daftar Owner</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Aksi
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($akuns as $akun)
                      <tr>
                        <td>
                          {{$akun->id}}
                        </td>
                        <td>
                            {{$akun->nama}}
                        </td>
                        <td>
                          <a href="/admin/{{$akun->id}}/reset/owner" class="btn btn-primary">Reset</a>
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
  </div>
@endsection