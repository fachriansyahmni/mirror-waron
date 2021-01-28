@extends('dashboard-layouts.d_master')
@section('content')
    <div class="container-fluid">
        <a href="{{route('user.warung.create')}}" class="btn btn-info">buat</a>
    </div>
    @foreach ($getMyWarung as $warung)
        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <div class="d-flex">
                    <img src="{{asset('img/shop.png')}}" width="100px">
                    <div class="ml-3 d-flex flex-column">
                        <strong class="proxi">{{$warung->nama_warung}}</strong>
                        @isset($warung->kategori)
                            <h5><span class="badge badge-primary">{{$warung->kategori->kategori}}</span></h5>
                        @endisset
                        @if ($warung->is_active == 1)
                            active
                        @else
                            pending
                        @endif
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <a href="{{route('warung.view',$warung->id)}}" class="btn btn-info">view</a>
                    <a href="{{route('user.warung.manage',$warung->id)}}" class="btn btn-outline-info">manage</a>
                </div>
            </div>
        </div>
    @endforeach
@endsection