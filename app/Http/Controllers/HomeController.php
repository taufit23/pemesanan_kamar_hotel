<?php

namespace App\Http\Controllers;

use App\Models\kamar;
use App\Models\tentang_hotel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $about = tentang_hotel::find(1)->get();
        return view('home.index', compact('about'));
    }
}