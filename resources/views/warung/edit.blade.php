@extends('dashboard-layouts.d_master')

@push('add-css')
<link rel="stylesheet" href="{{asset('vendor/leaflet/leaflet.css')}}" />
<style>
    #mapid{
        border-radius: 20px;
        width: 374px;
        height: 225px;
    }
</style>
@endpush

@php
$urlDataProvinsi = "https://dev.farizdotid.com/api/daerahindonesia/provinsi"; //ambil semua data provinsi
$getDataProvinsi = json_decode(file_get_contents($urlDataProvinsi), true);
$urlDataKota = "https://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=".old('prov',$DataWarung->prov_id);
$getDataKota = json_decode(file_get_contents($urlDataKota), true);
$urlDataKecamatan = "https://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=".old('kabkot',$DataWarung->kabkot_id);
$getDataKecamatan = json_decode(file_get_contents($urlDataKecamatan), true);
@endphp

@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td>Nama Warung : </td>
                    <td><input type="text" class="form-control" name="nama_warung" value="{{old('nama_warung',$DataWarung->nama_warung)}}" placeholder="Masukan Nama Warung"></td>
                </tr>
                <tr>
                    <td>Alamat : </td>
                    <td><textarea name="alamat" id="" cols="30" rows="10" class="form-control">{{old('alamat',$DataWarung->alamat)}}</textarea></td>
                </tr>
                
                <tr>
                    <td>Provinsi : </td>
                    <td>
                        <select name="prov" class='form-control'>
                            @foreach ($getDataProvinsi["provinsi"] as $index => $provinsi)
                                <option value="{{$provinsi["id"]}}" {{old('prov',$provinsi['id']) == $DataWarung->prov_id ? 'selected' : ''}}>{{$provinsi['nama']}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Kab/Kota : </td>
                    <td id="inputKabkot">
                        <select name="kabkot" class='form-control'>
                            <option>select kabupaten / kota</option>
                            @foreach ($getDataKota["kota_kabupaten"] as $index => $kota)
                                <option value="{{$kota["id"]}}" {{old('kabkot',$kota['id']) == $DataWarung->kabkot_id ? 'selected' : ''}}>{{$kota['nama']}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Kecamatan : </td>
                    <td>
                        <select name="kec" class='form-control'>
                            <option>select kecamatan</option>
                            @foreach ($getDataKecamatan["kecamatan"] as $index => $kecamatan)
                                <option value="{{$kecamatan["id"]}}" {{old('kec',$kecamatan['id']) == $DataWarung->kec_id ? 'selected' : ''}}>{{$kecamatan['nama']}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nomor Handphone : </td>
                    <td><input type="number" class='form-control' name="no_hp" value="{{old('no_hp',$DataWarung->no_hp)}}"></td>
                </tr>
                <tr>
                    <td>Koordinat : </td>
                    <td>
                        <input type="hidden" name="koordinat" id="inputKoordinat" value="{{old('koordinat',$DataWarung->koordinat)}}">
                        <div id="mapid"></div>
                    </td>
                </tr>
                <tr>
                    <td>Jenis Warung : </td>
                    <td>
                        <select name="jenis" id="" class="form-control">
                            <option disabled selected></option>
                            @foreach ($allCategories as $category)
                            <option value="{{$category->id}}">{{$category->kategori}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Foto Warung : </td>
                    <td><input type="file" name="foto"></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-success" name="submitedit">simpan & update</button>
        </form> 
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{asset('vendor/leaflet/leaflet.js')}}"></script>
    @if (count($koor) == 2)
        <script>
            var latx = "{{$koor[0]}}"; 
            var lngy = "{{$koor[1]}}"; 

            var mymap = L.map('mapid').setView([latx, lngy], 13);
            var marker = L.marker([latx, lngy]).addTo(mymap);
            marker.bindPopup("<b>{{$DataWarung->nama_warung}}</b>").openPopup();
            marker.on('dragend', function(event){
                var marker = event.target;
                marker.setLatLng(new L.LatLng(event.latlng.lat, event.latlng.lng),{draggable:'true'});
                mymap.panTo(new L.LatLng(event.latlng.lat, event.latlng.lng))
            });
            mymap.addLayer(marker);
            L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="#">kios.ku</a>'
            }).addTo(mymap);
            mymap.on('click', function(e) {
                mymap.removeLayer(marker);
                $('#inputKoordinat').val(e.latlng.lat + ", " + e.latlng.lng);
                marker = new L.marker([e.latlng.lat, e.latlng.lng]).addTo(mymap);
            });
        </script>
    @endif
    <script>
        $(document).ready(function(){
            
        });

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
                    $('select[name="kec"]').append("<option>select kecamatan</option>");
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
    </script>
@endpush