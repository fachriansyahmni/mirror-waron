@extends('dashboard-layouts.d_master')

@push('add-css')
<link rel="stylesheet" href="{{asset('vendor/leaflet/leaflet.css')}}" />
@endpush

@section('header-content')
    <a href="#">back</a>
@endsection

@section('content')
<div class="container-fluid">
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td>Nama Warung : </td>
                <td><input type="text" name="nama_warung" placeholder="Masukan Nama Warung"></td>
            </tr>
            <tr>
                <td>Pemilik : </td>
                <td><input type="text" name="pemilik" value="{{old('pemilik',Auth::user()->nama)}}" disabled readonly placeholder="Masukan Nama Pemilik"></td>
            </tr>
            <tr>
                <td>Alamat : </td>
                <td>
                    <textarea name="alamat" id="" class="form-control" placeholder="Masukan Alamat Warung" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>Provinsi : </td>
                <td>
                    @php
                        $urlDataProvinsi = "https://dev.farizdotid.com/api/daerahindonesia/provinsi"; //ambil semua data provinsi
                        $getDataProvinsi = json_decode(file_get_contents($urlDataProvinsi), true);
                    @endphp
                    <select name="prov">
                        @foreach ($getDataProvinsi["provinsi"] as $index => $provinsi)
                            <option value="{{$provinsi["id"]}}">{{$provinsi['nama']}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kab/Kota : </td>
                <td>
                    <select name="kabkot">
                        <option selected disabled>Kabupaten / kota</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kecamatan : </td>
                <td>
                    <select name="kec">
                        <option selected disabled>Kecamatan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nomor Handphone : </td>
                <td><input type="number" name="no_hp"></td>
            </tr>
            <tr>
                <td>Koordinat : </td>
                <td>
                    <input type="text" name="koordinat"> <button class="btn btn-default" type="button" onclick="getLocation()">get coordinat</button>    
                    <div id="mapid" style="height: 180px;"></div> 
                </td>
            </tr>
            <tr>
                <td>Jenis Warung : </td>
                <td>
                    <select name="jenis" id="">
                        @foreach ($getAllCategoryWarung as $categoryWarung)
                        <option value="{{$categoryWarung->id}}">{{$categoryWarung->kategori}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Foto Warung : </td>
                <td><input type="file" name="foto"></td>
            </tr>
        </table>
        <button type="submit" name="submitwarung">Daftar</button>
    </form>   
</div>
@endsection
@push('scripts')
    <script src="{{asset('vendor/leaflet/leaflet.js')}}"></script>
    <script>
        $('select[name="prov"]').on('change', function() {
            $.ajax({
                url:"https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi="+this.value,
                type: "GET",
                contentType: 'application/json; charset=utf-8',
                success: function(resultData) {
                    data = JSON.stringify(resultData.kota_kabupaten);
                    $('select[name="kabkot"]').find('option').remove();
                    $('select[name="kec"]').find('option').remove();
                    $.each(JSON.parse(data), function(i, item) {
                        $('select[name="kabkot"]').append("<option value="+item.id+">"+item.nama+"</option>");
                    });
                },
                error : function(jqXHR, textStatus, errorThrown) {
                },

                timeout: 120000,
            })
        });
        $('select[name="kabkot"]').on('change', function() {
            $.ajax({
                url:"https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota="+this.value,
                type: "GET",
                contentType: 'application/json; charset=utf-8',
                success: function(resultData) {
                    data = JSON.stringify(resultData.kecamatan);
                    $('select[name="kec"]').find('option').remove();
                    $.each(JSON.parse(data), function(i, item) {
                        $('select[name="kec"]').append("<option value="+item.id+">"+item.nama+"</option>");
                    });
                },
                error : function(jqXHR, textStatus, errorThrown) {
                },

                timeout: 120000,
            })
        });
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }
        function showPosition(position) {  
            $('input[name="koordinat"]').val(position.coords.latitude+','+position.coords.longitude);
        
            var latx = position.coords.latitude;
            var lngy = position.coords.longitude;
            var mymap = L.map('mapid').setView([latx, lngy], 13);
            var marker = L.marker([latx, lngy]).addTo(mymap);
            marker.bindPopup("<b>my location</b>").openPopup();
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="#">zxc</a> Project'
            }).addTo(mymap);
        }
    </script>
@endpush
