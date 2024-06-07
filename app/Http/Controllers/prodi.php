<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\prodiModel;

class prodi extends Controller
{
    public function index()
    {
        $data = prodiModel::all();
        return view('prodi/prodi', compact('data'));
    }
    public function tambah()
    {

        return view('prodi/tambahprodi');
    }
    public function prosestambah(Request $request)
    {
        $request->validate(
            [
                'nama'    => 'required',
                'kode'  => 'required'
            ],
            [
                'nama.required' => 'Nama Harus Diisi',
                'kode.required' => 'Kode Kelas Harus Diisi'
            ]
        );

        if ($request->has('gambar')) {
            $file = $request->file('gambar');
            $ekstensi = $file->getClientOriginalExtension();

            $namefile = time() . '.' . $ekstensi;

            $path = 'assets/img/prodi/';
            $file->move($path, $namefile);
        }

        $data['kode'] = $request->kode;
        $data['nama'] = $request->nama;
        $data['deskripsi'] = $request->deskripsi;
        $data['gambar'] = $namefile;
        $data['status'] = $request->status;

        prodiModel::Create($data);
        return redirect('/prodi');
    }
    public function edit(Request $request, $id)
    {
        $data = prodiModel::find($id);

        return view('prodi/edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data['kode'] = $request->kode;
        $data['nama'] = $request->nama;
        $data['deskripsi'] = $request->deskripsi;
        $data['status'] = $request->status;

        prodiModel::whereId($id)->update($data);
        return redirect('/prodi');
    }
    public function hapus(Request $request, $id)
    {
        $data = prodiModel::find($id);

        if ($data) {
            $data->delete();
        }
        return redirect('/prodi');
    }
    public function detail($id)
    {
        $data = prodiModel::find($id);

        return view('prodi/detail', compact('data'));
    }
}
