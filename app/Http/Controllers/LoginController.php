<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LoginController extends Controller
{
    function index()
    {
        return view('login');
    }

    function proseslogin(Request $request)
    {
        $request->validate(
            [
                'nomorinduk' => 'required',
                'password' => 'required'
            ],
            [
                'nomorinduk.required' => 'Nomor Induk Harus Diisi',
                'password.required' => 'Password Harus Diisi'
            ]
        );
        $data = [
            'nomorinduk' => $request->nomorinduk,
            'password' => $request->password
        ];

        if (FacadesAuth::attempt($data)) {
            return redirect('/dashboard')->with('msg', 'Berhasil Login');
        } else {
            return redirect('/')->with('msg', 'Email atau Password tidak tersedia!!');
        }
    }
    function logout()
    {
        FacadesAuth::logout();
        return redirect('/');
    }
}
