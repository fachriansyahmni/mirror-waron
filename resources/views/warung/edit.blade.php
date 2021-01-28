@extends('dashboard-layouts.d_master')

@section('content')
<form method="POST" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td>Nama Warung : </td>
            <td><input type="text" name="nama_warung" value="{{old('nama_warung',$DataWarung->nama_warung)}}" placeholder="Masukan Nama Warung"></td>
        </tr>
        <tr>
            <td>Alamat : </td>
            <td><input type="text" name="alamat" value="{{old('alamat',$DataWarung->alamat)}}" placeholder="Masukan Alamat Warung"></td>
        </tr>
        
        <tr>
            <td>Provinsi : </td>
            <td>
                @php
                    $urlDataProvinsi = "https://dev.farizdotid.com/api/daerahindonesia/provinsi"; //ambil semua data provinsi
                    $getDataProvinsi = json_decode(file_get_contents($urlDataProvinsi), true);
                    // dd($getDataProvinsi);
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
            <td id="inputKabkot">
                <select name="kabkot">
                </select>
            </td>
        </tr>
        <tr>
            <td>Kecamatan : </td>
            <td>
                <select name="kec">
                </select>
            </td>
        </tr>
        <tr>
            <td>Nomor Handphone : </td>
            <td><input type="text" name="no_hp" value="{{old('no_hp',$DataWarung->no_hp)}}"></td>
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
    <button type="submit" name="submitedit">simpan & update</button>
</form> 
@endsection

@push('scripts')
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
    </script>
@endpush