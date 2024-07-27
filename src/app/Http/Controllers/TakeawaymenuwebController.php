<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class TakeawaymenuwebController extends Controller
{
    public function index()
    {
        $makanan = Product::where('category', 'makanan')->get();
        $minuman = Product::where('category', 'minuman')->get();
        return view('frontweb.takeawaymenu', compact('makanan', 'minuman'));
    }
}
