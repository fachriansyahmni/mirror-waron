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
        Nama Barang : {{$barang->nama}} <br>
        Deskripsi : {{$barang->deskripsi}} <br>
        Harga : {{$barang->harga}} <br>
        Gambar : {{$barang->gambar}} <br>
        Stock : {{$barang->stok}} <br>
        pilihan :
        @if ($barang->status_id == 1)
            Tersedia  <br>
        @else
            Tidak Tersedia <br>
        @endif
        <a href="/barang/{{$barang->id}}/edit" class="btn btn-info">Edit</a>
        <a href="/barang/{{$barang->id}}/edit-stok" class="btn btn-info">Edit Stok Barang</a>
        <form action="/barang/{{$barang->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Hapus</button>
        </form>
</body>
</html> 
@endsection
