@extends('layouts.main-layout')

@push('css')
    <style>
        .content{
            display:flex;
        }
        .content #filter{
            width: 30%;
            max-width: 220px;
        }
        .content #content-filter{
            width: 100%;
            padding-left: 20px
        }
        .card-content-result{
            background: #ECECEC;
            border-radius: 50px;
        }
        .card-content-result:hover{
            background: #B4F5FF;
        }
        .card-content-result .card-cr-img{
            height: 100px;
            width: 100%;
            background: url("{{asset('img/shop.svg')}}") no-repeat;
            background-position: center;
            background-position-y: 10px;;
            background-origin: content-box;
            padding: 20px;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid" style="margin-top: 120px; margin-bottom: 20px; min-height: 100vh;">
        <div class="search-form">
            <form method="GET" id="form_search">
                <input type="text" name="q" class="form-control" value="{{$_GET['q']}}">
                <button class="btn btn-info">cari</button>
            </form>
        </div>
        <section class="content">
            <div id="filter">
                <div class="card card-body shadow-none">
                    <div class="form-group text-center">
                        Type
                        <div class="row">
                            <div class="col">
                                <input id="r_type_warung" type="radio" name="type" value="warung" checked>
                                <label for="r_type_warung">Warung</label>
                            </div>
                            <div class="col">
                                <input id="r_type_barang" type="radio" name="type" value="barang">
                                <label for="r_type_barang">Barang</label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        Kategori
                        <select name="category" id="">
                            <option value="0">All</option>
                            @php
                                $getAllCategories = App\KategoriWarung::select(['id','kategori'])->get();
                            @endphp
                            @foreach ($getAllCategories as $category)
                                <option value="{{$category->id}}">{{$category->kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button>filter</button>
            </div>
            <div id="content-filter" class="row">
                @if (count($hasil) < 1)
                    <div class="col-lg-12 text-center">
                        <strong>Tidak ada hasil</strong>
                    </div>
                @endif
                @foreach ($hasil as $warung)
                <div class="col-lg-3 col-md-4 col-sm-4 mb-3">
                    <div class="card shadow-none border-0 card-content-result">
                        <div class="card-cr-img"></div>
                        <div class="card-body">
                            <b>{{$warung->nama_warung}}</b>
                            <div class="text-muted">@isset($warung->owner)
                                {{$warung->owner->nama}}
                            @endisset</div>
                            <a href="{{route('overview.warung',$warung->id)}}" class="stretched-link text-muted text-decoration-none"></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection