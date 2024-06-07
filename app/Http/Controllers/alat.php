<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alatModel;

class alat extends Controller
{
    public function index()
    {
        $data = alatModel::all();
        return view('alat/alat', compact('data'));
    }
    public function tambah()
    {

        return view('alat/tambahalat');
    }
    public function prosestambah(Request $request)
    {
        $request->validate(
            [
                'nama'    => 'required',
                'deskripsi'  => 'required',
                'stok'  => 'required'
            ],
            [
                'nama.required' => 'Nama Harus Diisi',
                'deskripsi.required' => 'Nomor Induk Harus Diisi',
                'stok.required' => 'Role Harus Diisi'
            ]
        );
        if ($request->has('gambar')) {
            $file = $request->file('gambar');
            $ekstensi = $file->getClientOriginalExtension();

            $filename = time() . '.' . $ekstensi;

            $path = 'assets/img/alat/';
            $file->move($path, $filename);
        }

        $alat = alatModel::latest()->first();
        $kodealat = "A-";
        if ($alat == NULL) {
            $kode = "0001";
        } else {
            $kode = substr($alat->kode, 2, 4) + 1;
            $kode = str_pad($kode, 4, "0", STR_PAD_LEFT);
        }
        $kode = $kodealat . $kode;
        $data['kode'] = $kode;
        $data['nama'] = $request->nama;
        $data['deskripsi'] = $request->deskripsi;
        $data['gambar'] = $filename;
        $data['status'] = 'TERSEDIA';
        $data['stok'] = $request->stok;

        alatModel::Create($data);
        return redirect('/alat')->with('message', 'Data Berhasil ditambahkan!!');
    }
    public function edit(Request $request, $id)
    {
        $data = alatModel::find($id);

        return view('alat/editalat', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data['kode'] = $request->kode;
        $data['nama'] = $request->nama;
        $data['deskripsi'] = $request->deskripsi;
        $data['status'] = $request->status;
        $data['stok'] = $request->stok;

        alatModel::whereId($id)->update($data);
        return redirect('/alat');
    }
    public function hapus(Request $request, $id)
    {
        $data = alatModel::find($id);

        if ($data) {
            $data->delete();
        }
        return redirect('/alat');
    }
    public function detail($id)
    {
        $data = alatModel::find($id);

        return view('alat/detailalat', compact('data'));
    }
}
