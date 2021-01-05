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
        Harga : {{$barang["harga"]}} <br>
        Gambar : {{$barang["gambar"]}} <br>
        pilihan :
        @if ($barang->status_id == 1)
            Tersedia  <br>
        @else
            Tidak Tersedia <br>
        @endif
</body>
</html>