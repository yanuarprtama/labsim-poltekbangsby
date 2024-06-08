<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;
use App\Models\peminjamanLabModel;

class peminjamanLab extends Controller
{
    public function index()
    {
        $data = peminjamanLabModel::all();
        return view('peminjaman/peminjamanLab', compact('data'));
    }
    public function konfirmasi(Request $request, $id)
    {
        $data = peminjamanLabModel::find($id);

        return view('peminjaman/konfirmasipeminjaman', compact('data'));
    }
    public function terima(Request $request, $id)
    {
        $data['status'] = 'DITERIMA';

        peminjamanLabModel::whereId($id)->update($data);
        return redirect('/peminjamanlab');
    }
}
