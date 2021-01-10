@extends('dashboard-layouts.d_master')
@section('content')
    <div class="container-fluid">
        <a href="{{route('user.warung.create')}}" class="btn btn-info">buat</a>
    </div>
    @foreach ($getMyWarung as $warung)
        <div class="card">
            {{$warung}}
        </div>
    @endforeach
@endsection