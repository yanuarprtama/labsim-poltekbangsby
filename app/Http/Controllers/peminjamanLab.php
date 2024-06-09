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

    public function check_availability($namalab, $waktu_mulai, $waktu_selesai) 
    {
        $transactions = peminjamanLabModel::where('namalab', $namalab)
            ->where(function ($query) use ($waktu_mulai, $waktu_selesai) {
                $query->whereBetween('waktu_mulai', [$waktu_mulai, $waktu_selesai])
                    ->orWhereBetween('waktu_selesai', [$waktu_mulai, $waktu_selesai]);
            })
            ->get();

            return $transactions;
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->request->add(['nomor_peminjaman' => 'PMJ-' . time()]);
        $request->request->add(['jumlah_kapsitas' => $request->jumlah_peserta]);
        $request->request->add(['course' => $request->praktikum]);
        $request->request->add(['status' => 'PENDING']);

        // $data = $request->all();
        $isFree = $this->check_availability($request->namalab, $request->waktu_mulai, $request->waktu_selesai);
        if (count($isFree) > 0) {
            return redirect()->back()->with('error', 'Lab sudah terpakai');
        }
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
