@extends('dashboard-layouts.d_master')

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
                <td><input type="text" name="alamat" placeholder="Masukan Alamat Warung"></td>
            </tr>
            <tr>
                <td>Kecamatan : </td>
                <td>
                    <select name="kec">
                        <option value="Dago">Dago</option>
                        <option value="Tambun">Tambun</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Kab/Kota : </td>
                <td>
                    <select name="kabkot">
                        <option value="Kota Bandung">Kota Bandung</option>
                        <option value="Kab.Bekasi">Kab.Bekasi</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Provinsi : </td>
                <td>
                    <select name="prov">
                        <option value="Jawa Barat">Jawa Barat</option>
                        <option value="Jawa Barat">Jawa Barat</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nomor Handphone : </td>
                <td><input type="text" name="no_hp"></td>
            </tr>
            <tr>
                <td>Koordinat : </td>
                <td><input type="text" name="koordinat"></td>
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
        <button type="submit" name="submitwarung">Daftar</button>
    </form>    
</div>
@endsection
