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
        <h1>Edit stok</h1>
        <form action="/barang/{{$barang->id}}/stok" method="POST">
        @csrf
        @method("PUT")
            <table>
                <tr>
                    <td>Stock</td>
                    <td><input type="number" name="stok" placeholder="Masukan Stok Barang" value="{{$barang->stok}}"></td>
                </tr>
            </table>
            <button class="btn btn-info">Edit Stok</button>
        </form>
    </body>
    </html>
@endsection