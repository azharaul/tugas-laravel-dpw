<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Form Master Tiket</h2>

<form action="{{ url('/master-tiket/simpan') }}" method="post">
    @csrf

    Tujuan Tiket <br>
    <input type="text" name="tujuan"><br><br>

    Harga Tiket <br>
    <input type="number" name="harga"><br><br>

    <button type="submit">SIMPAN</button>
    <a href="/">Kembali</a>
</form>

</body>
</html>