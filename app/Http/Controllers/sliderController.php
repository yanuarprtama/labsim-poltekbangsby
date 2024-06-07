<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slider;

class sliderController extends Controller
{
    public function index()
    {
        $data = slider::all();
        return view('konten/slider', compact('data'));
    }
    public function tambahslider()
    {
        return view('konten/tambah');
    }
    public function prosestambahslider(Request $request)
    {
        $request->validate(
            [
                'slug'    => 'required',
                'judul'          => 'required'
            ],
            [
                'slug.required' => 'Kolom slug harus diisi',
                'judul.required'     => 'Kolom judul harus diisi'
            ]
        );

        if ($request->has('gambar')) {
            $file = $request->file('gambar');
            $ekstensi = $file->getClientOriginalExtension();

            $filename = time() . '.' . $ekstensi;

            $path = 'assets/img/slider/';
            $file->move($path, $filename);
        }

        $data['slug'] = $request->slug;
        $data['judul'] = $request->judul;
        $data['deskripsi'] = $request->deskripsi;
        $data['gambar'] = $filename;
        $data['url'] = $request->url;
        $data['posisi'] = $request->posisi;


        slider::Create($data);
        return redirect('/slider');
    }
    public function edit(Request $request, $id)
    {
        $data = slider::find($id);

        return view('konten/edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data['slug'] = $request->slug;
        $data['judul'] = $request->judul;
        $data['deskripsi'] = $request->deskripsi;
        $data['url'] = $request->url;
        $data['posisi'] = $request->posisi;

        slider::whereId($id)->update($data);
        return redirect('/slider');
    }
    public function hapus(Request $request, $id)
    {
        $data = slider::find($id);

        if ($data) {
            $data->delete();
        }
        return redirect('/slider');
    }
}
