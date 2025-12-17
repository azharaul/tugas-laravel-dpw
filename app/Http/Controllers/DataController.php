<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DataController extends Controller
{
    public function index()
    {
        $tiket = DB::table('master_tiket')->get();
        return view('welcome', compact('tiket'));
    }

    public function masterTiket()
    {
        return view('master_tiket');
    }

    public function simpanMaster(Request $request)
    {
        DB::table('master_tiket')->insert([
            'tujuan' => $request->tujuan,
            'harga'  => $request->harga
        ]);

        return redirect('/master-tiket');
    }

    public function hasil(Request $request)
    {
        $nim     = $request->input('nim');
        $nama    = $request->input('nama');
        $jumlah  = $request->input('jumlah_tiket');
        $no_hp   = $request->input('no_hp');
        $alamat  = $request->input('alamat');
        $metode  = $request->input('metode_pembayaran');
        $tanggal = $request->input('tanggal_bayar');

        $tiket = DB::table('master_tiket')
            ->where('id', $request->tujuan)
            ->first();

        if (!$tiket) {
            return "Data tiket tidak ditemukan. <a href='/'>Kembali</a>";
        }

        $harga = $tiket->harga;

        $total_harga = $harga * $jumlah;

        if ($jumlah >= 3) {
            $diskon = 0.1 * $total_harga;
            $ket_diskon = "Diskon 10%";
        } else {
            $diskon = 0;
            $ket_diskon = "Tidak dapat diskon";
        }

        $total_bayar = $total_harga - $diskon;

        return "
    <h2>Hasil Pembelian Tiket</h2>
    <hr>
    No ID : $nim <br>
    Nama : $nama <br>
    Tujuan : {$tiket->tujuan} <br>
    Harga Tiket : Rp " . number_format($harga) . " <br>
    Jumlah Tiket : $jumlah <br>
    Total Harga : Rp " . number_format($total_harga) . " <br>
    Keterangan Diskon : $ket_diskon <br>
    Diskon : Rp " . number_format($diskon) . " <br>
    <b>Total Bayar : Rp " . number_format($total_bayar) . "</b><br><br>
    No HP : $no_hp <br>
    Alamat : $alamat <br>
    Metode Pembayaran : $metode <br>
    Tanggal Bayar : $tanggal <br><br>

    <a href='/'>Kembali</a>
    ";
    }
}
