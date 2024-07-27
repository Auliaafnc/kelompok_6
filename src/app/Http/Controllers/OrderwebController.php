<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderwebController extends Controller
{
    public function index()
    {
        return view('frontweb.order');
    }
}
