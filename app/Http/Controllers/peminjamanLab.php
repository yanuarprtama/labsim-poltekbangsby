<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Http\Request;
use App\Models\peminjamanLabModel;
use App\Models\User;

class peminjamanLab extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;
        if ($role == "Super Admin" or $role == "Admin") {
            $data = peminjamanLabModel::all(); 
        }else{
            $data = peminjamanLabModel::where('nama_pengguna', auth()->user()->name)->get();
        }

        // dd($data);
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
        $request->request->add(['jumlah_peserta' => $request->jumlah_peserta]);
        $request->request->add(['course' => $request->course]);
        $request->request->add(['jenis_peminjaman'=> $request->jenis_peminjaman]);
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
        $peminjaman = peminjamanLabModel::find($id);

        if ($peminjaman) {
            $peminjaman->status = 'DITERIMA';
            $peminjaman->save();
        }

        return redirect()->route('peminjamanlab')->with('success', 'Peminjaman telah diterima.');
        // $data['status'] = 'DITERIMA';

        // peminjamanLabModel::whereId($id)->update($data);
        // return redirect('/peminjamanlab');
    }
    public function tolak(Request $request, $id)
    {
        $data['status'] = 'DITOLAK';

        peminjamanLabModel::whereId($id)->update($data);
        return redirect('/peminjamanlab');
    }
    public function kembalikanlab($id)
    {
        $peminjaman = peminjamanLabModel::find($id);

        if ($peminjaman && $peminjaman->status == 'DITERIMA') {
            $peminjaman->status = 'DIKEMBALIKAN';
            $peminjaman->save();
        }

        return redirect()->route('pengembalianlab')->with('success', 'Peminjaman berhasil dikembalikan.');
    }
}
