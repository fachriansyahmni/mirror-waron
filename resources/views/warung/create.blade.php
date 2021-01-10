<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <h1>Register Warung</h1>
    <form action="/registerwarung" method="POST">
        @csrf
        <table>
            <tr>
                <td>Nama Warung : </td>
                <td><input type="text" name="nama_warung" placeholder="Masukan Nama Warung"></td>
            </tr>
            <tr>
                <td>Pemilik : </td>
                <td><input type="text" name="pemilik" placeholder="Masukan Nama Pemilik"></td>
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
                <td><input type="text" name="foto"></td>
            </tr>
        </table>
        <button type="submit">Daftar</button>
    </form>
</body>
</html>