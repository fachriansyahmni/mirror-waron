<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Halaman index</h1>
    <button>
        <a href="/barang/create">masukan barang</a>
    </button>
    @foreach ($barangs as $barang)
        <br> 
        Nama Barang : {{$barang->nama}} <br>
        Deskripsi : {{$barang->deskripsi}} <br>
        Harga : {{$barang->harga}} <br>
        Gambar : {{$barang->gambar}} <br>
        pilihan : {{$barang->pilihan}}
        @if ($barang->status_id == 1)
            Tersedia  <br>
        @else
            Tidak Tersedia <br>
        @endif
        <button>
            <a href="/barang/{{$barang->id}}/show">Detail</a>
        </button>
        <button>
            <a href="/barang/{{$barang->id}}/edit">Edit</a>
        </button>
        <form action="/barang/{{$barang->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button>delete</button>
        </form>
        <br>
    @endforeach
</body>
</html>