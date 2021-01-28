@extends('dashboard-layouts.d_master')
@section('content')
    <div class="container-fluid">
        <a href="{{route('user.warung.create')}}" class="btn btn-info">buat</a>
    </div>
    @foreach ($getMyWarung as $warung)
        <div class="card">
            <div class="card-body d-flex justify-content-between">
                <div class="">
                    <img src="{{asset('img/shop.png')}}" width="100px">
                    <div class="">
                        <strong class="proxi">{{$warung->nama_warung}}</strong>
                        {{$warung->kategori->kategori}}
                        {{$warung->is_active}}
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