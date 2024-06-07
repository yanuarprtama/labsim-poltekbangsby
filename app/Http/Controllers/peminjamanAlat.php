<?php

namespace App\Http\Controllers;

use App\Models\peminjamanAlatModel;
use Illuminate\Http\Request;

class peminjamanAlat extends Controller
{
    public function index()
    {
        $data = peminjamanAlatModel::all();
        return view('peminjaman/peminjamanAlat', compact('data'));
    }
    public function konfirmasi(Request $request, $id)
    {
        $data = peminjamanAlatModel::find($id);

        return view('peminjaman/konfirmasiPeminjamanAlat', compact('data'));
    }
    public function terima(Request $request, $id)
    {
        $data['status'] = 'DITERIMA';

        peminjamanAlatModel::whereId($id)->update($data);
        return redirect('/peminjamanalat');
    }
}
