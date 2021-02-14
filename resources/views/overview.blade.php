@extends('layouts.main-layout')

@push('css')
<link rel="stylesheet" href="{{asset('vendor/leaflet/leaflet.css')}}" />
<style>
        :root {
        --lightgray: #efefef;
        --blue: steelblue;
        --white: #fff;
        --maincolor: #B4F5FF;
        --black: rgba(0, 0, 0, 0.8);
        --bounceEasing: cubic-bezier(0.51, 0.92, 0.24, 1.15);
        }

    .open-modal {
        font-weight: bold;
        background: var(--blue);
        color: var(--white);
        padding: 0.75rem 1.75rem;
        margin-bottom: 1rem;
        border-radius: 5px;
    }
        /* MODAL
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    .modal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        background: var(--black);
        cursor: pointer;
        visibility: hidden;
        opacity: 0;
        transition: all 0.35s ease-in;
    }

    .modal.is-visible {
        visibility: visible;
        opacity: 1;
    }

    .modal-dialog {
        position: relative;
        max-width: 800px;
        max-height: 80vh;
        border-radius: 5px;
        background: var(--white);
        overflow: auto;
        cursor: default;
    }

    .modal-dialog > * {
        padding: 1rem;
    }

    .modal-header,
    .modal-footer {
        background: var(--maincolor);
    }

    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    button.close-modal{
        border-radius: 20px;
        border: 0;
        background: transparent;
    }
    .modal-header .close-modal {
        font-size: 1.5rem;
    }

    .modal p + p {
    margin-top: 1rem;
    }
    textarea#txtMsgWA{
        min-width: 600px;
    }
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
        display:inline-flex;
        /* flex-direction: row; */
        flex-wrap: wrap;
        gap: 20px;
    }
    .items .barang{
        width: 200px;
        height: 300px;
        /* margin-left: auto;
        margin-right: auto; */
        margin: 10px 20px;
    }
    .items .barang img{
        border-radius: 20px;
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
        border-color: #B4F5FF;
    }
    .search-input:focus{
        border-color: none;
        box-shadow: none;
    }
    .search-input::-webkit-input-placeholder{
        text-indent: 50%;
    }
    a.btn-c-whatsapp{
        background: #DCF8C6;
        padding: 20px;
        border-radius: 10px;
        text-decoration: none;
        margin-top: 20px;
        color: #128C7E;
    }
    a.btn-c-whatsapp:hover{
        background: #25D366;
    }
    form#formByCategory{
        display: none;
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
                <a href="#" onclick="document.getElementById('formByCategory').submit();" class="text-muted proxi"></i>
                    {{$WarungData->kategori->kategori}}
                </a>
                <form id="formByCategory" method="GET" action="{{route('cari')}}">
                    <input type="text" name="category" value="{{$WarungData->kategori->id}}">
                </form>
            @else
                <a href="#" class="text-muted proxi"></i>
                    Warung
                </a>
            @endisset
        </div>
        <a href="https://bit.ly/3p8rSlh" class="text-muted proxi">laporkan</a>
    </div>
</div>

<section id="detailsWarung" class="d-flex">
    <img class="imgWarung" src="{{asset('img/shop.png')}}">
    <div class="infoWarung" class="d-flex flex-column" style="max-width: 460px">
        <strong style="font-size: 20px" class="text-uppercase proxi">{{$WarungData->nama_warung}}</strong>
        <div class="proxi" style="color: #B0B0B0">
          {{$WarungData->nama_kecamatan}}, {{$WarungData->nama_kota}}
        </div> {{-- Lokasi --}}
        <div class="" style="padding-right: 10px;">
            <p>
                {{$WarungData->alamat}}, {{$WarungData->nama_kecamatan}}, {{$WarungData->nama_kota}},  {{$WarungData->nama_provinsi}}
            </p>
            <br>
            <a href="#" data-open="modal1" class="btn-c-whatsapp proxi open-modal"><img style="width: 20px; margin-right: 10px;" src="{{asset('img/whatsapp.svg')}}" alt=""> whatsapp</a>
            <div class="modal" id="modal1">
                <div class="modal-dialog">
                  <header class="modal-header">
                    Kirim Pesan
                    <button class="close-modal" aria-label="close modal" data-close>
                      &times;  
                    </button>
                  </header>
                    <section class="modal-content">
                        Isi Pesan
                        <textarea id="txtMsgWA" rows="10"></textarea>
                        <button id="btnkirim">kirim</button>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div id="mapid"></div> 
</section>
<section id="etalase">
    <h3 class="proxi">Etalase</h3>
    <div class="searchform">
        <form method="GET" id="formCariBarang" style="padding: 0 50px 0 50px;text-align: -webkit-center;">
            <input type="text" class="form-control form-control-lg search-input" name="cari" placeholder="cari">
        </form>
    </div>
    <div class="items">
        @foreach ($barangs as $barang)
            <div class="barang" data-open="barang{{$barang->id}}">
                 @if ($barang->gambar == null)
                        <svg width="201" height="174" viewBox="0 0 201 174" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="201" height="174" rx="20" fill="#EFEFEF"/>
                        </svg>
                        @else    
                        <img src="{{asset($barang->gambar)}}" width="201" height="174" alt="">
                        @endif
                        <div class="details-barang">
                            <span class="proxi name-product">
                                <strong>{{$barang->nama}}</strong>
                            </span>
                            <span class="proxi price-product">@currency($barang->harga)</span>
                            @if ($barang->stok >= 1)
                                <span class="proxi status-product-ready" style="color:green">tersedia</span>
                            @else
                                <span class="proxi status-product-unready" style="color:red">tidak tersedia</span>
                            @endif
                </div>
            </div>
            <div class="modal" id="barang{{$barang->id}}">
                <div class="modal-dialog" style="min-width: 70vw;">
                  <header class="modal-header" style="background: transparent;border: 0;">
                    Barang Details
                    <button class="close-modal" aria-label="close modal" data-close>
                      &times;  
                    </button>
                  </header>
                    <section class="modal-content" style=" border: 0;">
                        <p style="text-align:justify;">
                            <img src="{{asset($barang->gambar)}}" style="float:left; width:250px; height:250px; margin:0 8px 4px 0;">
                            <span style="font-size: 30px"><b>{{$barang->nama}}</b></span><br>
                            <span style="color:grey">Harga :</span><br>
                            <span style="font-size: 25px;">@currency($barang->harga)</span><br>
                            <span style="color:grey"> Stok : </span>
                            @if ($barang->stok >= 1)
                                {{$barang->stok}}
                            @else
                                Habis
                            @endif
                            <br><br>
                                <span style="color:grey">Deskripsi :</span>
                            <br>
                            {{$barang->deskripsi}}
                        </p>
                    </section>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection


@push('scripts')
<script src="{{asset('vendor/leaflet/leaflet.js')}}"></script>
    @if(count($koor) == 2)
        <script>
            var latx = "{{$koor[0]}}"; 
            var lngy = "{{$koor[1]}}"; 
            var mymap = L.map('mapid').setView([latx, lngy], 13);
            var marker = L.marker([latx, lngy]).addTo(mymap);
            marker.bindPopup("<b>{{$WarungData->nama_warung}}</b>").openPopup();
                    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                        attribution: '&copy; <a href="#">kios.ku</a>'
            }).addTo(mymap);
        </script>
    @endif

@isset ($_GET['cari'])
        <script>
            $(function() {
                $('html, body').animate({
                    scrollTop: $(".searchform").offset().top
                }, 1500);
            });
        </script>
@endisset
<script>
    const openEls = document.querySelectorAll("[data-open]");
    const closeEls = document.querySelectorAll("[data-close]");
    const isVisible = "is-visible";

    for (const el of openEls) {
    el.addEventListener("click", function() {
        const modalId = this.dataset.open;
        document.getElementById(modalId).classList.add(isVisible);
    });
    }

    for (const el of closeEls) {
    el.addEventListener("click", function() {
        this.parentElement.parentElement.parentElement.classList.remove(isVisible);
    });
    }

    document.addEventListener("click", e => {
    if (e.target == document.querySelector(".modal.is-visible")) {
        document.querySelector(".modal.is-visible").classList.remove(isVisible);
    }
    });

    document.addEventListener("keyup", e => {
    // if we press the ESC
    if (e.key == "Escape" && document.querySelector(".modal.is-visible")) {
        document.querySelector(".modal.is-visible").classList.remove(isVisible);
    }
    });

    $('#btnkirim').click(function(){
        window.open(
            'https://api.whatsapp.com/send?phone=62{{$WarungData->no_hp}}&text='+$('#txtMsgWA').val(),
            '_blank' // <- This is what makes it open in a new window.
        );
    })
</script>
@endpush