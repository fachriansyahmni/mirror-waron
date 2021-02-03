@extends('layouts.main-layout')

@push('css')
    <style>

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

        #div-view-warung{
            margin-top: 100px;
            display: flex;
        }
        #div-view-warung section#details-warung{
            width: 30%;
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
    </style>
@endpush

@section('content')
<div id="div-view-warung" class="container-fluid">
    <section id="details-warung">
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
        <div id="etalase-warung" class="mt-5">
            <div class="option-etalase d-flex justify-content-between">
                <h4 class="proxi">Etalase</h4>
                <button id="btnTambahProduk"  class="btn btn-primary">Tambah Produk</button>
            </div>
            <div class="items">
                    @foreach ($barangs as $barang)
                    <div class="barang">
                        <svg width="201" height="174" viewBox="0 0 201 174" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="201" height="174" rx="20" fill="#EFEFEF"/>
                        </svg>
                        <div class="details-barang">
                            <span class="proxi name-product">
                                <a href="/barang/{{$barang->id}}/show">{{$barang->nama}}</a>
                            </span>
                            <span class="proxi price-product">{{$barang->harga}}</span>
                            @if ($barang->status_id == 1)
                                <span class="proxi status-product-ready">tersedia</span>
                            @else
                                <span class="proxi status-product-unready">tidak tersedia</span>
                            @endif 
                        </div>
                    </div>
                    @endforeach
            </div>
        </div>
    </section>
</div>

<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
      <div class="modal-header">
        <span class="close">&times;</span>
      </div>
      <div class="modal-body">
        <form action="{{route('barang.create',$DataWarung->id)}}" method="POST">
            @csrf
            <table>
                <tr>
                    <td>Nama Barang :</td>
                    <td><input type="text" name="nama" placeholder="Masukan Nama Barang"></td>
                </tr>
                <tr>
                    <td>Deskripsi :</td>
                    <td>
                        <input type="text" name="deskripsi" placeholder="Deskripsi">
                    </td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="harga" placeholder="Masukan Harga"></td>
                </tr>
                <tr>
                    <td>Gambar</td>
                    <td><input type="text"name="gambar" placeholder="Gambar"></td>
                </tr>
                <tr>
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
                </tr>
                
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
    var modal = document.getElementById("myModal");
    
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
@endpush