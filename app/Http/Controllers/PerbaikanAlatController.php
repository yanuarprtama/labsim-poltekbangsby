<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\perbaikanAlat;
use Illuminate\Http\Request;

class PerbaikanAlatController extends Controller
{
    public function index()
    {
        // $data = Lab::where('status_ketersediaan', 'TERSEDIA')->get();
        $data = perbaikanAlat::all();
        return view('perbaikanAlat/perbaikanAlat', compact('data'));
    }
    public function tambah()
    {
        $data = Lab::all();
        return view('perbaikanAlat/tambahperbaikanAlat', compact('data'));
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
        $data['keterangan'] = $request->keterangan;
        $data['status'] = 'PENDING';

        perbaikanAlat::Create($data);
        return redirect('/perbaikanAlat');
    }
    public function edit(Request $request, $id)
    {
        $data = perbaikanAlat::find($id);
        $lab = Lab::all();

        return view('perbaikanAlat/edit', compact('data', 'lab'));
    }
    public function update(Request $request, $id)
    {
        $data['namalab'] = $request->nama;
        $data['tanggal'] = $request->tanggal;
        $data['jenisperawatan'] = $request->jenisperawatan;
        $data['keterangan'] = $request->keterangan;
        $data['status'] = 'PENDING';

        perbaikanAlat::whereId($id)->update($data);
        return redirect('/perbaikanAlat');
    }
    public function hapus(Request $request, $id)
    {
        $data = perbaikanAlat::find($id);

        if ($data) {
            $data->delete();
        }
        return redirect('/perbaikanAlat');
    }
    public function detail($id)
    {
        $data = perbaikanAlat::find($id);

        return view('perbaikanAlat/detaillab', compact('data'));
    }
}
