<?php

namespace App\Http\Controllers;

use App\Models\alatModel;
use App\Models\peminjamanAlatModel;
use App\Models\User;
use App\Models\Lab;
use Illuminate\Http\Request;

class peminjamanAlat extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;
        if ($role == "Super Admin" or $role == "Admin") {
            $data = peminjamanAlatModel::all(); 
        }else{
            $data = peminjamanAlatModel::where('nama_pengguna', auth()->user()->name)->get();
        }
        return view('peminjaman/peminjamanAlat', compact('data'));

    }
    public function create()
    {
        $alats = alatModel::all();
        $lab = Lab::all();
        return view('peminjaman/formPeminjamanAlat', compact('alats','lab'));
        
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->request->add(['nomor_peminjaman' => 'PMJ-' . time()]);
        $request->request->add(['matakuliah' => $request->matakuliah]);
        $request->request->add(['course' => $request->course]);
        $request->request->add(['jenis_peminjaman'=> $request->jenis_peminjaman]);
        $request->request->add(['status' => 'PENDING']);

        // $data = $request->all();
        peminjamanAlatModel::create($request->all());
        return redirect('/peminjamanAlat');
    }
    public function konfirmasi(Request $request, $id)
    {
        $data = peminjamanAlatModel::find($id);

        return view('peminjaman/konfirmasiPeminjamanAlat', compact('data'));
    }
    public function terimaalat(Request $request, $id)
    {
        $data['status'] = 'DITERIMA';

        peminjamanAlatModel::whereId($id)->update($data);
        return redirect('/peminjamanAlat');
    }
    public function tolak(Request $request, $id)
    {
        $data['status'] = 'DITOLAK';

        peminjamanAlatModel::whereId($id)->update($data);
        return redirect('/peminjamanalat');
    }
    public function kembalikanalat($id)
    {
        $peminjaman = peminjamanAlatModel::find($id);

        if ($peminjaman && $peminjaman->status == 'DITERIMA') {
            $peminjaman->status = 'DIKEMBALIKAN';
            $peminjaman->save();
        }

        return redirect()->route('peminjamanAlat')->with('success', 'Peminjaman berhasil dikembalikan.');
    }
}
