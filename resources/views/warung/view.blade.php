@extends('layouts.main-layout')

@push('css')
    <style>
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
        .barang .details-barang span.status-product{
            margin-top: 10px;
            font-size: 15px;
            font-weight: 300;   
            color:#22FF1E;     
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
                    8
                </div>
            </div>
        </div>
        <div id="etalase-warung" class="mt-5">
            <div class="option-etalase d-flex justify-content-between">
                <h4 class="proxi">Etalase</h4>
                <button>tambah produk</button>
            </div>
            <div class="items">
                @for ($i = 0; $i < 25; $i++)
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
                @endfor
            </div>
        </div>
    </section>
</div>
@endsection