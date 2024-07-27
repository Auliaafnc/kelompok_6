<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutwebController extends Controller
{
    public function index()
    {
        return view('frontweb.about');
    }
}
