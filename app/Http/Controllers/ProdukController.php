<?php

namespace App\Http\Controllers;

use App\Models\kamar;
use App\Models\tentang_hotel;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function produk()
    {
        $about = tentang_hotel::find(1)->get();
        $kamar = kamar::latest('created_at', 'desc')->get();
        return view('home.produk', compact('about', 'kamar'));
    }
}
