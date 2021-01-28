@extends('layouts.main-layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create Items</h1>
    <form action="/barang" method="POST">
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
                    <input type="radio" name="status_id" value="1"><br>
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
</body>
</html>
@endsection