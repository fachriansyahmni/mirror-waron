@extends('dashboard-layouts.d_master')
@section('content')
    <div class="container-fluid">
        <a href="{{route('user.warung.create')}}" class="btn btn-info">buat</a>
    </div>
    @foreach ($getMyWarung as $warung)
        <div class="card">
            {{$warung}}
            <a href="#" class="btn btn-info">view</a>
            <a href="{{route('user.warung.manage',$warung->id)}}" class="btn btn-outline-info">manage</a>
        </div>
    @endforeach
@endsection