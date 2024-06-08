<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\administratorModel;
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
        return view('administrator/tambahadmin');
    }
    public function prosestambahadmin(Request $request)
    {
        $request->validate(
            [
                'nama'  => 'required',
                'nomorinduk'    => 'required',
                'password'  => 'required',
                'role'  => 'required'
            ],
            [
                'nama.required' => 'Nomor Induk Harus Diisi',
                'nomorinduk.required' => 'Password Harus Diisi',
                'password.required' => 'Nomor Induk Harus Diisi',
                'role.required' => 'Role Harus Diisi'
            ]
        );

        $data['nomorinduk'] = $request->nomorinduk;
        $data['name'] = $request->nama;
        $data['password'] = Hash::make($request->password);
        $data['role'] = $request->role;

        administratorModel::Create($data);
        return redirect('/administrator');
    }
    public function edit(Request $request, $id)
    {
        $data = administratorModel::find($id);

        return view('administrator/edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data['nomorinduk'] = $request->nomorinduk;
        $data['name'] = $request->nama;
        $data['role'] = $request->role;

        administratorModel::whereId($id)->update($data);
        return redirect('/administrator');
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
