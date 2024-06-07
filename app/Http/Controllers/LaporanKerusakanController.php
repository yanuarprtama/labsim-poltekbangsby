<?php

namespace App\Http\Controllers;

use App\Models\alatModel;
use App\Models\laporanKerusakan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanKerusakanController extends Controller
{
    public function index()
    {
        // $data = Lab::where('status_ketersediaan', 'TERSEDIA')->get();
        $data = laporanKerusakan::all();
        // dd($data->alats->nama);
        return view('laporanKerusakan/laporanKerusakan', compact('data'));
    }
    public function tambah()
    {
        $data = alatModel::all();
        return view('laporanKerusakan/tambah', compact('data'));
    }
    public function prosestambahkerusakan(Request $request)
    {
        $request->validate(
            [
                'kode'    => 'required',
                'uraian'  => 'required'
            ],
            [
                'nama.required' => 'Nama Harus Diisi',
                'uraian.required' => 'Sertakan uraian kerusakan'
            ]
        );
        if ($request->has('gambar')) {
            $file = $request->file('gambar');
            $ekstensi = $file->getClientOriginalExtension();

            $filename = time() . '.' . $ekstensi;

            $path = 'assets/img/laporanKerusakan/';
            $file->move($path, $filename);
        }
        $kerusakan = laporanKerusakan::latest()->first();
        $kodeKerusakan = "NLPK-";
        if ($kerusakan == NULL) {
            $kode = "0001";
        } else {
            $kode = substr($kerusakan->nomor_laporan, 5, 4) + 1;
            $kode = str_pad($kode, 4, "0", STR_PAD_LEFT);
        }
        $nomor = $kodeKerusakan . $kode;
        $datetime = Carbon::now()->format('Y-m-d');

        $data['nomor_laporan'] = $nomor;
        $data['kode_item'] = $request->kode;
        $data['tanggal'] = $datetime;
        $data['kategori'] = $request->kategori;
        $data['uraian'] = $request->uraian;
        $data['gambar'] = $filename;


        laporanKerusakan::Create($data);
        return redirect('/kerusakan');
    }
    public function edit(Request $request, $id)
    {
        $data = laporanKerusakan::find($id);
        $alat = alatModel::all();

        return view('laporanKerusakan/edit', compact('data', 'alat'));
    }
    public function update(Request $request, $id)
    {
        $data['kode_item'] = $request->kode;
        $data['kategori'] = $request->kategori;
        $data['uraian'] = $request->uraian;

        laporanKerusakan::whereId($id)->update($data);
        return redirect('/kerusakan');
    }
    public function hapus(Request $request, $id)
    {
        $data = laporanKerusakan::find($id);

        if ($data) {
            $data->delete();
        }
        return redirect('/kerusakan');
    }
}
