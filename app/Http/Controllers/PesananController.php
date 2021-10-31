<?php

namespace App\Http\Controllers;

use App\Models\kamar;
use App\Models\pesanan;
use App\Models\tentang_hotel;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function buat_pesanan(Request $request)
    {
        $kamar_id = kamar::where('type_kamar', $request->jenis_kamar)->get();
        foreach ($kamar_id as $kamsaa) {
            $id_kamar = $kamsaa;
        }
        foreach ($kamar_id as $kamar) {
            $kamar = intval($kamar->harga_kamar);
        }
        $total_bayar = $kamar * $request->waktu_menginap;
        if ($request->breakfast == 'y') {
            $total_bayar = $request->waktu_menginap * 80000 + $total_bayar;
            $total_bayar;
        }
        $pesanan = new pesanan();
        $pesanan->nama_pemesan = $request->nama_pemesan;
        $pesanan->jenis_kelamin_pemesan = $request->jenis_kelamin;
        $pesanan->nomor_identitas_pemesan = $request->nomor_identitas_pemesan;
        $pesanan->kamar_id = $id_kamar->id;
        $pesanan->durasi_menginap = $request->waktu_menginap;
        $pesanan->layanan_kamar = $request->breakfast;
        $pesanan->total_bayar = $total_bayar;
        $pesanan->save();
        return redirect()->route('pesanan_list')->with('success', 'Penambahan paket berhasil');
    }
    public function
    pesanan_list()
    {
        $about = tentang_hotel::find(1)->get();
        $pesanan = pesanan::with('kamar')->get();

        return view('home.pesanan_list', compact('about', 'pesanan'));
    }
}