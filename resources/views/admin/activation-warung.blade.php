@extends('dashboard-layouts.d_master')

@section('content')
<h2>Manage Warung</h2>
<div class="content">
    <div class="container-fluid">
        <div class="card">
            {{-- <div class="card-body">
                <form method="GET">
                    <input type="text" class="form-control" placeholder="cari">
                </form>
            </div> --}}
            
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th width="10px">NO</th>
                            <th>Warung</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($getWarungNotActive) < 1)
                        <tr class="text-center">
                            <td colspan="3">no record</td>
                        </tr>
                        @endif
                        @foreach ($getWarungNotActive as $index => $warung)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>
                                <div class="card card-collapse">
                                    <div class="card-header" role="tab" id="headingTwo">
                                      <h5 class="mb-0">
                                        {{$warung->nama_warung}}
                                      </h5>
                                    </div>
                                    <div id="collapseWarung-{{$index}}" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>Owner</td>
                                                    <td><strong>{{$warung->owner->username}}</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td>{{$warung->alamat}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Peta</td>
                                                    <td>{{$warung->koordinat}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <form method="POST">
                                            @csrf
                                            <input type="hidden" value="{{$warung->id}}" name="warungId">
                                            <button type="submit" name="confirm-warung" class="btn btn-success btn-block">confirm</button>
                                        </form>
                                    </div>
                                  </div>
                            </td>
                            <td width="20px">
                                <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseWarung-{{$index}}">details</button>
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