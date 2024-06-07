<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\pengembalianLabModel;
use Illuminate\Http\Request;

class pengembalianLab extends Controller
{
    public function index()
    {
        $data = pengembalianLabModel::where('status', 'DIKEMBALIKAN')->get();
        return view('pengembalian/pengembalianLab', compact('data'));
    }
}
