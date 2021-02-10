@extends('layouts.main-layout')

@push('css')
    <style>
        /* modal type 1 */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }
        /* Modal Content */
        .modal-content {
            position: relative;
            background-color: #fefefe;
            margin: auto;
            padding: 0;
            border: 1px solid rgb(248, 248, 248);
            width: 80%;
            max-width: 620px;
            border-radius: 20px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
            -webkit-animation-name: animatetop;
            -webkit-animation-duration: 0.4s;
            animation-name: animatetop;
            animation-duration: 0.4s
        }
        :root {
        --lightgray: #efefef;
        --blue: steelblue;
        --white: #fff;
        --maincolor: #B4F5FF;
        --black: rgba(0, 0, 0, 0.397);
        --bounceEasing: cubic-bezier(0.51, 0.92, 0.24, 1.15);
        }
        /* modal type 2 */
        .open-modal2 {
            font-weight: bold;
            background: var(--blue);
            color: var(--white);
            padding: 0.75rem 1.75rem;
            margin-bottom: 1rem;
            border-radius: 5px;
        }
            /* MODAL
        –––––––––––––––––––––––––––––––––––––––––––––––––– */
        .modal2 {
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

        .modal2.is-visible2 {
            visibility: visible;
            opacity: 1;
        }

        .modal2-dialog {
            position: relative;
            max-width: 800px;
            max-height: 80vh;
            border-radius: 5px;
            background: var(--white);
            overflow: auto;
            cursor: default;
        }

        .modal2-dialog > * {
            padding: 1rem;
        }

        .modal2-header,
        .modal2-footer {
            background: var(--maincolor);
        }

        .modal2-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        button.close-modal2{
            border-radius: 20px;
            border: 0;
            background: transparent;
        }
        .modal2-header .close-modal2 {
            font-size: 1.5rem;
        }

        .modal2 p + p {
        margin-top: 1rem;
        }

        /* Add Animation */
        @-webkit-keyframes animatetop {
            from {top:-300px; opacity:0} 
            to {top:0; opacity:1}
        }

        @keyframes animatetop {
            from {top:-300px; opacity:0}
            to {top:0; opacity:1}
        }

        /* The Close Button */
        .close {
            color: rgb(63, 63, 63);
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-header {
            /* padding: 2px 16px; */
            /* background-color: #5cb85c; */
            color: white;
            border: 0;
        }

        .modal-body {padding: 2px 16px;}

        .modal-footer {
            padding: 2px 16px;
            background-color: #5cb85c;
            color: white;
        }

        .d-flex{
            display: flex;
        }
        .d-flex.flex-column{
            flex-direction: column;
        }
        #div-view-warung{
            margin-top: 100px;
            display: flex;
            min-height: 100vh;
        }
        #div-view-warung section#details-warung{
            width: 30%;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 50px;
        }
        #details-warung img.imgWarung{
            background:#B4F5FF;
            padding: 10px;
            max-width: 200px;
            max-height: 200px;
            width: 100%;
            border-radius: 100%;
        }
        .infoWarung{
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        #div-view-warung section#items-warung{
            width: 100%;
            margin-left: 10px;
        }
        .c-card .c-card-heading{
            color: #777777;
            font-family: "Font Proxi";
            text-transform: uppercase;
            padding: .5rem;
        }
        .c-card .c-card-body{
            font-family: "Font Proxi";
            padding: .5rem;
        }
        .bd-callout{
            border: 1px solid #e9ecef;
            border-left-width: 12px;
        }
        .bd-callout.bd-just-left{
            border: initial;
            border-left: 12px solid;
        }
        .bd-callout.c-border-blue{
            border-left-color: #B4F5FF;
        }
        .items{
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
        .barang .details-barang span.status-product-ready{
            margin-top: 10px;
            font-size: 15px;
            font-weight: 300;   
            color:#22FF1E;     
        }
        .barang .details-barang span.status-product-unready{
            margin-top: 10px;
            font-size: 15px;
            font-weight: 300;   
            color:#ff531e;     
        }



        #target-content {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            pointer-events: none;
            opacity: 0;
            transition: opacity 200ms;
        }
        #target-content:target {
            pointer-events: all;
            opacity: 1;
        }
        #target-content #target-inner {
            position: absolute;
            display: block;
            padding: 48px;
            line-height: 1.8;
            width: 70%;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            box-shadow: 0px 12px 24px rgba(0, 0, 0, 0.2);
            background: white;
            color: #34495E;
        }
        #target-content #target-inner h2 {
            margin-top: 0;
        }
        #target-content #target-inner code {
            font-weight: bold;
        }
        #target-content a.close {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: #34495E;
            opacity: 0.5;
            transition: opacity 200ms;
        }
        #target-content a.close:hover {
            opacity: 0.4;
        }

        @media only screen and (max-width:1020px) {
            #div-view-warung section#details-warung{
                display: none;
            }
        }
    </style>
@endpush

@section('content')
<div id="div-view-warung" class="container-fluid">
    <section id="details-warung">
        <img class="imgWarung" src="{{asset('img/shop.png')}}">
        <div class="infoWarung">
            <h4><strong class="proxi">{{$DataWarung->nama_warung}}</strong></h4>
            <div class="text-muted">{{$DataWarung->nama_kecamatan}}, {{$DataWarung->nama_kota}}</div>
            <div class="alamatWarung">{{$DataWarung->alamat}}, {{$DataWarung->nama_kecamatan}}, {{$DataWarung->nama_kota}},  {{$DataWarung->nama_provinsi}}</div>
        </div>
    </section>
    <section id="items-warung">
        <div class="card border-0 flex" style="flex-flow: wrap;">
            <div class="c-card" style="max-width: 281px;">
                <div class="c-card-heading bd-callout bd-just-left c-border-blue">
                        Total Produk
                </div>
                <div class="c-card-body text-center">
                    {{count($barangs)}}
                </div>
            </div>
        </div>
        {{-- <a href="#target-content" id="button">Open CSS Modal via <code>:target</code></a> --}}

        {{-- <div id="target-content">
            <a href="#" class="close"></a>
            <div id="target-inner">
                <h2>CSS Modal</h2>
                This modal is open because its id is the target in the <code>href</code> of the link. You can style an element's target state with the selector <code>:target</code>. When this modal is toggled, an invisible link with <code>href="#"</code> is positioned absolutely behind the modal content. Clicking it will change the target and thus close the modal.
            </div>
        </div> --}}
        <div id="etalase-warung" class="mt-5">
            <div class="option-etalase d-flex justify-content-between">
                <h4 class="proxi">Etalase</h4>
                <button id="btnTambahProduk" class="btn btn-primary">Tambah Produk</button>
            </div>
            <div class="items">
                    @foreach ($barangs as $barang)
                    <div class="barang"  data-open="barang{{$barang->id}}">
                        @if ($barang->gambar == null)
                            <svg width="201" height="174" viewBox="0 0 201 174" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="201" height="174" rx="20" fill="#EFEFEF"/>
                            </svg>
                        @else    
                            <img src="{{asset($barang->gambar)}}" width="201" height="174" alt="">
                        @endif
                        <div class="details-barang">
                            <span class="proxi name-product">
                                {{-- <a href="/barang/{{$barang->id}}/show">{{$barang->nama}}</a> --}}
                                <strong>{{$barang->nama}}</strong>
                            </span>
                            <span class="proxi price-product">@currency($barang->harga)</span>
                            @if ($barang->stok >= 1)
                                <span class="proxi status-product-ready">tersedia</span>
                            @else
                                <span class="proxi status-product-unready">tidak tersedia</span>
                            @endif 
                        </div>
                    </div>
                    <div class="modal2" id="barang{{$barang->id}}">
                        <div class="modal2-dialog" style="min-width: 70vw;">
                          <header class="modal2-header" style="background: transparent;border: 0;">
                            Barang Details
                            <button class="close-modal2" aria-label="close modal2" data-close>
                              &times;  
                            </button>
                          </header>
                            <section class="modal2-content" style=" border: 0;">
                                <form method="POST" action="{{route('barang.update.action')}}" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="">
                                        <input type="hidden" value="{{$barang->id}}" name="idbarang"> 
                                        @if ($barang->gambar == null)
                                        <svg width="201" height="174" viewBox="0 0 201 174" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="201" height="174" rx="20" fill="#EFEFEF"/>
                                        </svg>
                                        @else    
                                        <img src="{{asset($barang->gambar)}}" width="201" height="174" alt="">
                                        @endif
                                        <input type="text" name="e_namabarang" value="{{old('e_namabarang',$barang->nama)}}" placeholder="nama barang" required>
                                        <input type="number" name="e_harga" value="{{old('e_harga',$barang->harga)}}" required>
                                        <input type="text" name="e_stok" value="{{old('e_stok',$barang->stok)}}">

                                        <button type="submit">update</button>
                                    </div>
                                </form>       
                            </section>
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </section>
</div>

<div id="modalTambahProduk" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
      </div>
      <div class="modal-body">
        <form action="{{route('barang.create',$DataWarung->id)}}" enctype="multipart/form-data" method="POST">
            @csrf
            <table>
                <tr>
                    <td>Nama Barang :</td>
                    <td><input type="text" name="nama" placeholder="Masukan Nama Barang" required></td>
                </tr>
                <tr>
                    <td>Deskripsi :</td>
                    <td>
                        <input type="text" name="deskripsi" placeholder="Deskripsi">
                    </td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="harga" placeholder="Masukan Harga" required></td>
                </tr>
                <tr>
                    <td>Gambar</td>
                    <td><input type="file" name="gambar"></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="number" name="stok" placeholder="Masukan Stok Barang"></td>
                </tr>
                {{-- <tr>
                    <td>Pilihan</td>
                    <td>
                        <input type="radio" name="status_id" checked value="1"><br>
                        <label for="">Tersedia</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" name="status_id" value="0">
                        <label for="">Tidak Tersedia</label>
                    </td>
                </tr> --}}
                
            </table>
            <button>Submit</button>
        </form>
      </div>
    </div>
  
</div>
@endsection

@push('scripts')
<script>
    // Get the modal
    var modal = document.getElementById("modalTambahProduk");
    
    // Get the button that opens the modal
    var btn = document.getElementById("btnTambahProduk");
    
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
    
    // When the user clicks the button, open the modal 
    btn.onclick = function() {
      modal.style.display = "block";
    }
    
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    </script>
    <script>
        const openEls = document.querySelectorAll("[data-open]");
        const closeEls = document.querySelectorAll("[data-close]");
        const isVisible = "is-visible2";
    
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
            if (e.target == document.querySelector(".modal2.is-visible2")) {
                document.querySelector(".modal2.is-visible2").classList.remove(isVisible);
            }
        });
    
        document.addEventListener("keyup", e => {
            // if we press the ESC
            if (e.key == "Escape" && document.querySelector(".modal2.is-visible2")) {
                document.querySelector(".modal2.is-visible2").classList.remove(isVisible);
            }
        });
    </script>
@endpush