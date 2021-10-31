<?php

namespace App\Http\Controllers;

use App\Models\kamar;
use App\Models\tentang_hotel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HargaController extends Controller
{
    public function daftar_harga()
    {
        $about = tentang_hotel::find(1)->get();
        $kamar = kamar::latest('created_at', 'desc')->paginate(10);
        $waktu_pesan = Carbon::now();
        foreach ($kamar as $br) {
            $kamar_breakfast = $br->harga_kamar + 80000;
        }
        return view('home.daftar_harga', compact('about', 'kamar', 'kamar_breakfast', 'waktu_pesan'));
    }
}