<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\halaman;

class halamanController extends Controller
{
    public function index()
    {
        $data = halaman::all();
        return view('konten/halaman', compact('data'));
    }
}
