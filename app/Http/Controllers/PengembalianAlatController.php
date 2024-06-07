<?php

namespace App\Http\Controllers;

use App\Models\pengembalianAlat;
use Illuminate\Http\Request;

class PengembalianAlatController extends Controller
{
    public function index()
    {
        $data = pengembalianAlat::where('status', 'DIKEMBALIKAN')->get();
        return view('pengembalian/pengembalianalat', compact('data'));
    }
}
