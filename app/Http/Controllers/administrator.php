<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\administratorModel;
use App\Models\prodiModel;
use Illuminate\Support\Facades\Hash;

class administrator extends Controller
{
    public function index()
    {
        $data = administratorModel::all();
        return view('administrator/administrator', compact('data'));
    }
    public function tambahadmin()
    {
        // return view('administrator/tambahadmin');

        $prodi = prodiModel::all();
        return view('administrator/tambahadmin',compact('prodi'));
    }
    public function prosestambahadmin(Request $request)
    {
        $request->validate(
            [
                'nama'  => 'required',
                'nomorinduk'    => 'required',
                'password'  => 'required',
                'role'  => 'required',
                'prodi' => 'required',
                'pengguna' => 'required'

            ],
            [
                'nama.required' => 'Nomor Induk Harus Diisi',
                'nomorinduk.required' => 'Password Harus Diisi',
                'password.required' => 'Nomor Induk Harus Diisi',
                'role.required' => 'Role Harus Diisi',
                'prodi.required' => 'Prodi Harus Diisi',
                'pengguna.required' => 'Pengguna Harus Diisi'
            ]
        );

        $data['nomorinduk'] = $request->nomorinduk;
        $data['nama'] = $request->nama;
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;
        $data['prodi'] = $request->prodi;
        $data['jenis_pengguna'] = $request->pengguna;

        administratorModel::Create($data);
        return redirect('/administrator');
    }
    public function edit(Request $request, $id)
    {
        $data = administratorModel::find($id);
        $prodi = prodiModel::all();

        return view('administrator/edit', compact('data','prodi'));
    }
    public function update(Request $request, $id)
    {
        $data['nomorinduk'] = $request->nomorinduk;
        $data['nama'] = $request->nama;
        $data['role'] = $request->role;
        $data['prodi'] = $request->prodi;
        $data['jenis_pengguna'] = $request->pengguna;

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
    
        administratorModel::whereId($id)->update($data);
        return redirect('/administrator')->with('msg', 'Data updated successfully');
    }
    public function hapus(Request $request, $id)
    {
        $data = administratorModel::find($id);

        if ($data) {
            $data->delete();
        }
        return redirect('/administrator');
    }
    public function detail($id)
    {
        $data = administratorModel::find($id);

        return view('administrator/detail', compact('data'));
    }
}
