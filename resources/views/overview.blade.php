@extends('layouts.main-layout')

@push('css')
<link rel="stylesheet" href="{{asset('vendor/leaflet/leaflet.css')}}" />
<style>
    #detailsWarung,#etalase{
        padding: 0 50px 0 50px;
    }
    #detailsWarung img.imgWarung{
        background:#B4F5FF;
        padding: 20px;
        max-width: 232px;
        max-height: 232px;
        width: 100%;
        border-radius: 100%;
    }
    #detailsWarung .infoWarung{
        margin-left: 30px;
    }
    #mapid{
        border-radius: 20px;
        width: 374px;
        height: 225px;
        margin-left: auto;
    }

    #etalase{
        margin-top: 10vh;
        min-height: 100vh;
    }
    #etalase .items{
        display:flex;
        /* flex-direction: row; */
        flex-wrap: wrap;
    }
    .items .barang{
        width: 200px;
        height: 300px;
        /* margin-left: auto;
        margin-right: auto; */
        margin: 10px auto 10px auto;
    }
    .items .barang:hover{
        background:#dfe6e960;
        border-radius: 20px;
    }
    .barang .details-barang{
        padding-left: 10px;
        margin-top: 15px;
        display: flex;
        flex-direction: column;
    }
    .barang .details-barang span.name-product{
        font-size: 18px;
        font-weight: 300;        
    }
    .barang .details-barang span.price-product{
        font-size: 15px;
        font-weight: 300;   
        color:#B0B0B0;     
    }
    .barang .details-barang span.status-product{
        margin-top: 10px;
        font-size: 15px;
        font-weight: 300;   
        color:#22FF1E;     
    }
    .searchform{
        margin-bottom: 30px;
        position: sticky;
        top: 20px;
    }
    .search-input{
        border-radius: 40px;
        max-width: 600px;
    }
    .search-input:hover{
        border-color: #B4F5FF
    }
    .search-input:focus{
        border-color: none;
        box-shadow: none;
    }
    .search-input::-webkit-input-placeholder{
        text-indent: 50%;
    }
    a.btn-c-whatsapp{
        padding: 20px;
    }




    @media only screen and (max-width:1020px) {
      #detailsWarung{
          flex-direction: column;
          align-items: center;
      }
      #detailsWarung .infoWarung{
        text-align: center;
        margin: 40px 0 0 0;
      }
      #mapid{
          display: none;
      }
    }
</style>
@endpush

@section('content')
<div class="container-fluid" style="margin-top: 50px;">
    <div class="d-flex justify-content-between p-5">
        <div class="">
            <a href="/" class="text-muted proxi"></i>home</a> > 
            @isset($WarungData->kategori)
            <a href="{{route('kategori.warung',$WarungData->kategori->id)}}" class="text-muted proxi"></i>
                {{$WarungData->kategori->kategori}}
            </a>
            @else
            <a href="#" class="text-muted proxi"></i>
                Warung
            </a>
            @endisset
        </div>
        <a href="#" class="text-muted proxi">laporkan</a>
    </div>
</div>

<section id="detailsWarung" class="d-flex">
    <img class="imgWarung" src="{{asset('img/shop.png')}}">
    <div class="infoWarung" class="d-flex flex-column" style="max-width: 460px">
        <strong style="font-size: 20px" class="text-uppercase proxi">{{$WarungData->nama_warung}}</strong>
        <div class="proxi" style="color: #B0B0B0">
            {{$WarungData->prov_id}}
        </div> {{-- Lokasi --}}
        <div class="">
            {{$WarungData->alamat}}, {{$WarungData->kec_id}}, {{$WarungData->kabkot_id}} 
            <br>
            <a href="{{$WarungData->no_hp}}" class="btn-c-whatsapp">whatsapp</a>
        </div>
    </div>
    <div id="mapid"></div> 
</section>
<section id="etalase">
    <h3 class="proxi">Etalase</h3>
    <div class="searchform">
        <form method="POST" style="padding: 0 50px 0 50px;text-align: -webkit-center;">
            @csrf
            <input type="text" class="form-control form-control-lg search-input" placeholder="cari">
        </form>
    </div>
    <div class="items">
        @foreach ($barangs as $barang)
            <div class="barang">
                <svg width="201" height="174" viewBox="0 0 201 174" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="201" height="174" rx="20" fill="#EFEFEF"/>
                </svg>
                <div class="details-barang">
                    <span class="proxi name-product">{{$barang->nama}}</span>
                    <span class="proxi price-product">{{$barang->harga}}</span>
                    <span class="proxi status-product">tersedia</span>
                </div>
            </div>
        @endforeach
    </div>
    
    {{-- <div class="items">
        <div class="barang">
            <svg width="201" height="174" viewBox="0 0 201 174" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="201" height="174" rx="20" fill="#EFEFEF"/>
            </svg>
            <div class="details-barang">
                <span class="proxi name-product">product name</span>
                <span class="proxi price-product">RP 123.456</span>
                <span class="proxi status-product">tersedia</span>
            </div>
        </div>
    </div> --}}
</section>
@endsection


@push('scripts')
<script src="{{asset('vendor/leaflet/leaflet.js')}}"></script>
    @if(count($koor) == 2)
        <script>
            var latx = "{{$koor[0]}}"; //misalkan -6.210591
            var lngy = "{{$koor[1]}}"; //misalkan 106.850043
            var mymap = L.map('mapid').setView([latx, lngy], 13);
            var marker = L.marker([latx, lngy]).addTo(mymap);
            marker.bindPopup("<b>my location</b>").openPopup();
                    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="#">kios.ku</a>'
            }).addTo(mymap);
        </script>
    @endif
@endpush