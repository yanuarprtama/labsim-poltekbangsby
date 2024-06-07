<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\perawatanLab;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PerawatanLabController extends Controller
{
    public function index()
    {
        // $data = Lab::where('status_ketersediaan', 'TERSEDIA')->get();
        $data = perawatanLab::all();
        return view('perawatan/perawatan', compact('data'));
    }
    public function tambah()
    {
        $data = Lab::all();
        return view('perawatan/tambah', compact('data'));
    }
    public function prosestambahperawatan(Request $request)
    {
        $request->validate(
            [
                'nama'    => 'required',
                'jenis_perawatan'  => 'required'
            ],
            [
                'nama.required' => 'Nama Harus Diisi',
                'jenis_perawatan.required' => 'Pilih Terlebih Dahulu Jenis Perawatannya'
            ]
        );

        $data['namalab'] = $request->nama;
        $data['tanggal'] = $request->tanggal;
        $data['jenisperawatan'] = $request->jenis_perawatan;
        $data['status'] = 'PENDING';

        if ($request->tanggal >= Carbon::now()) {
            perawatanLab::Create($data);
        } else {
            return redirect('/tambahperawatan');
        }
        return redirect('/perawatan');
    }
    public function edit(Request $request, $id)
    {
        $data = perawatanLab::find($id);
        $lab = Lab::all();

        return view('perawatan/edit', compact('data', 'lab'));
    }
    public function update(Request $request, $id)
    {
        $data['namalab'] = $request->nama;
        $data['tanggal'] = $request->tanggal;
        $data['jenisperawatan'] = $request->jenisperawatan;
        $data['status'] = 'PENDING';

        perawatanLab::whereId($id)->update($data);
        return redirect('/perawatan');
    }
    public function hapus(Request $request, $id)
    {
        $data = perawatanLab::find($id);

        if ($data) {
            $data->delete();
        }
        return redirect('/perawatan');
    }
    public function konfirmasi($id)
    {
        $data = perawatanLab::find($id);
        $lab = Lab::all();

        return view('perawatan/konfirmasi', compact('data', 'lab'));
    }
    public function konfirmasip(Request $request, $id)
    {
        if ($request->has('gambar')) {
            $file = $request->file('gambar');
            $ekstensi = $file->getClientOriginalExtension();

            $filename = time() . '.' . $ekstensi;

            $path = 'assets/img/perawatan/';
            $file->move($path, $filename);
        }
        $data['status'] = 'SELESAI';
        $data['gambar'] = $filename;

        perawatanLab::whereId($id)->update($data);
        return redirect('/perawatan');
    }
    public function batalperawatan($id)
    {
        $data['status'] = 'BATAL';

        perawatanLab::whereId($id)->update($data);
        return redirect('/perawatan');
    }
}
