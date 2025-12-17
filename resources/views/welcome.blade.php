<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembelian Tiket</title>
</head>
<body>
   <form action="{{ url('/hasil') }}" method="get">
    <table align="center">
        <tr>
            <td align="right" colspan="3">
                <h3>PR101-1402024013</h3>
            </td>
        </tr>

        <tr>
            <td>No ID</td>
            <td>:</td>
            <td><input type="text" name="nim"></td>
        </tr>

        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama"></td>
        </tr>

          
           <tr>
            <td>Tujuan</td>
            <td>:</td>
            <td>
                <select name="tujuan">
    <option value="">--Pilih Tujuan--</option>
    @foreach($tiket as $t)
        <option value="{{ $t->id }}">
            {{ $t->tujuan }} - Rp {{ number_format($t->harga) }}
        </option>
    @endforeach
</select>

            </td>
        </tr>
       
        <tr>
        <td>Jumlah Tiket</td>
        <td>:</td>
        <td><input type="number" name="jumlah_tiket"></td>
    </tr>

    <tr>
        <td>No HP</td>
        <td>:</td>
        <td><input type="text" name="no_hp"></td>
    </tr>
      <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>
                <textarea name="alamat" cols="30" rows="10"></textarea>
            </td>
        </tr>

        <tr>
            <td>Metode Pembayaran</td>
            <td>:</td>
            <td>
                <select name="metode_pembayaran">
                    <option value="">--Pilih Metode Pembayaran--</option>
                    <option value="BCA">BCA</option>
                    <option value="BNI">BNI</option>
                    <option value="Indomaret">Indomaret</option>
                </select>
            </td>
        </tr>

    <tr>
            <td>Tanggal Bayar</td>
            <td>:</td>
            <td><input type="date" name="tanggal_bayar"></td>
        </tr>

        

        <tr>
            <td align="center" colspan="3">
                <input type="submit" value="SIMPAN">
                <input type="reset" value="BATAL">
            </td>
        </tr>
    </table>
</form>

</body>
</html>