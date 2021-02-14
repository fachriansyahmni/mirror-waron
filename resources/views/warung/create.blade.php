@extends('dashboard-layouts.d_master')

@push('add-css')
<link rel="stylesheet" href="{{asset('vendor/leaflet/leaflet.css')}}" />
@endpush

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <table>
                    <tr>
                        <td>Nama Warung : </td>
                        <td><input class="form-control" type="text" name="nama_warung" value="{{old('nama_warung')}}" placeholder="Masukan Nama Warung"></td>
                    </tr>
                    <tr>
                        <td>Pemilik : </td>
                        <td><input class="form-control" type="text" name="pemilik" value="{{old('pemilik',Auth::user()->nama)}}" disabled readonly placeholder="Masukan Nama Pemilik"></td>
                    </tr>
                    <tr>
                        <td>Alamat : </td>
                        <td>
                            <textarea name="alamat" id="" class="form-control" placeholder="Masukan Alamat Warung" rows="10">{{old('alamat')}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Provinsi : </td>
                        <td>
                            @php
                                $urlDataProvinsi = "https://dev.farizdotid.com/api/daerahindonesia/provinsi"; //ambil semua data provinsi
                                $getDataProvinsi = json_decode(file_get_contents($urlDataProvinsi), true);
                            @endphp
                            <select name="prov" class="form-control">
                                <option disabled selected>pilih provinsi</option>
                                @foreach ($getDataProvinsi["provinsi"] as $index => $provinsi)
                                    <option value="{{$provinsi["id"]}}" {{old('prov') == $provinsi["id"] ? 'selected' : ""}}>{{$provinsi['nama']}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Kab/Kota : </td>
                        <td>
                            <select name="kabkot" class="form-control">
                                <option selected disabled class="text-muted">pilih Kabupaten / kota</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Kecamatan : </td>
                        <td>
                            <select name="kec" class="form-control">
                                <option selected disabled class="text-muted">pilih kecamatan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Nomor Handphone : </td>
                        <td><input type="number" class="form-control" value="{{old('no_hp')}}" name="no_hp"></td>
                    </tr>
                    <tr>
                        <td>Koordinat : </td>
                        <td>
                            <input type="hidden" value="{{old('koordinat')}}" name="koordinat" id="inputKoordinat"> <button class="btn btn-default" type="button" onclick="getLocation()">get coordinat</button>    
                            <div id="mapid" style="height: 180px;min-width: 50vw;"></div> 
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Warung : </td>
                        <td>
                            <select name="jenis" id="" class="form-control">
                                <option disabled selected></option>
                                @foreach ($getAllCategoryWarung as $categoryWarung)
                                <option value="{{$categoryWarung->id}}">{{$categoryWarung->kategori}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </table>
                <button type="submit" name="submitwarung" class="btn btn-primary">Daftar</button>
            </form>   
        </div>
    </div>
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
            });
        });
        $('select[name="kabkot"]').on('change', function() {
            var $selectkec = $('select[name="kec"]');
            $.ajax({
                url:"https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota="+this.value,
                type: "GET",
                contentType: 'application/json; charset=utf-8',
                success: function(resultData) {
                    data = JSON.stringify(resultData.kecamatan);
                    $selectkec.find('option').remove();
                    $selectkec.append("<option disabled selected></option>");
                    $.each(JSON.parse(data), function(i, item) {
                        $selectkec.append("<option value="+item.id+">"+item.nama+"</option>");
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
            mymap.on('click', function(e) {
                mymap.removeLayer(marker);
                $('#inputKoordinat').val(e.latlng.lat + ", " + e.latlng.lng);
                marker = new L.marker([e.latlng.lat, e.latlng.lng]).addTo(mymap);
            });
        }
    </script>
@endpush
