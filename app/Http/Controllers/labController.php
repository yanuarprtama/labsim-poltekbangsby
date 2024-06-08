<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab;
use Illuminate\Support\Facades\Storage;

class labController extends Controller
{
    public function index()
    {
        // $data = Lab::where('status_ketersediaan', 'TERSEDIA')->get();
        $data = Lab::all();
        return view('lab/lab', compact('data'));
    }
    public function tambah()
    {
        return view('lab/tambah');
    }
    public function prosestambahlab(Request $request)
    {
        $request->validate(
            [
                'kode'  => 'required',
                'nama'    => 'required',
                'deskripsi'  => 'required',
                'lokasi'  => 'required'
            ],
            [
                'kode.required' => 'Nomor Induk Harus Diisi',
                'nama.required' => 'Nama Harus Diisi',
                'deskripsi.required' => 'Nomor Induk Harus Diisi',
                'lokasi.required' => 'Role Harus Diisi'
            ]
        );
        if ($request->has('gambar')) {
            $file = $request->file('gambar');
            $ekstensi = $file->getClientOriginalExtension();

            $filename = time() . '.' . $ekstensi;

            $path = 'assets/img/lab/';
            $file->move($path, $filename);
        }

        $data['kode'] = $request->kode;
        $data['nama'] = $request->nama;
        $data['lokasi'] = $request->lokasi;
        $data['deskripsi'] = $request->deskripsi;
        $data['gambar'] = $filename;
        $data['virtualtour_url'] = $request->virtualtour_url;
        $data['prodi'] = $request->prodi;
        $data['status_ketersediaan'] = 'TERSEDIA';
        $data['kategori'] = $request->kategori;
        $data['status'] = $request->status;



        Lab::Create($data);
        return redirect('/lab');
    }
    public function edit(Request $request, $id)
    {
        $data = Lab::find($id);

        return view('lab/edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data['kode'] = $request->kode;
        $data['nama'] = $request->nama;
        $data['lokasi'] = $request->lokasi;
        $data['deskripsi'] = $request->deskripsi;
        $data['virtualtour_url'] = $request->virtualtour_url;
        $data['prodi'] = $request->prodi;
        $data['status_ketersediaan'] = $request->status_ketersediaan;
        $data['kategori'] = $request->kategori;
        $data['status'] = $request->status;

        Lab::whereId($id)->update($data);
        return redirect('/lab');
    }
    public function hapus(Request $request, $id)
    {
        $data = Lab::find($id);

        if ($data) {
            $data->delete();
        }
        return redirect('/lab');
    }
    public function detail($id)
    {
        $data = Lab::find($id);

        return view('lab/detaillab', compact('data'));
    }
}
