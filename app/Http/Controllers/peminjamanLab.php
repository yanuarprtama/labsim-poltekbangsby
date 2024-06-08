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

    public function create()
    {
        $lab = Lab::all();
        return view('peminjaman/formPeminjamanLab', compact('lab'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->request->add(['nomor_peminjaman' => 'PMJ-' . time()]);
        $request->request->add(['jumlah_kapsitas' => $request->jumlah_peserta]);
        $request->request->add(['course' => $request->praktikum]);
        $request->request->add(['status' => 'PENDING']);

        // $data = $request->all();
        peminjamanLabModel::create($request->all());
        return redirect('/peminjamanlab');
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
