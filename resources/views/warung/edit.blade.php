@extends('dashboard-layouts.d_master')

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
                        @php
                            $urlDataProvinsi = "https://dev.farizdotid.com/api/daerahindonesia/provinsi"; //ambil semua data provinsi
                            $getDataProvinsi = json_decode(file_get_contents($urlDataProvinsi), true);
                            // dd($getDataProvinsi);
                        @endphp
                        <select name="prov" class='form-control'>
                            @foreach ($getDataProvinsi["provinsi"] as $index => $provinsi)
                                <option value="{{$provinsi["id"]}}">{{$provinsi['nama']}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Kab/Kota : </td>
                    <td id="inputKabkot">
                        <select name="kabkot" class='form-control'>
                            <option>select kabupaten / kota</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Kecamatan : </td>
                    <td>
                        <select name="kec" class='form-control'>
                            <option>select kecamatan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Nomor Handphone : </td>
                    <td><input type="number" class='form-control' name="no_hp" value="{{old('no_hp',$DataWarung->no_hp)}}"></td>
                </tr>
                <tr>
                    <td>Koordinat : </td>
                    <td><input type="text" name="koordinat" value="{{old('koordinat',$DataWarung->koordinat)}}"></td>
                </tr>
                <tr>
                    <td>Jenis Warung : </td>
                    <td>
                        <select name="jenis" id="">
                            <option value="Warung Sembako">Warung Sembako</option>
                            <option value="Warung Kelontong">Warung Kelontong</option>
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