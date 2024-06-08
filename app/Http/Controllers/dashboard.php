<?php

namespace App\Http\Controllers;

use App\Models\administratorModel;
use App\Models\alatModel;
use App\Models\Lab;
use App\Models\peminjamanLabModel;
use App\Models\prodiModel;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    public function index()
    {
        $users = administratorModel::count();
        $prodi = prodiModel::count();
        $lab = Lab::count();
        $peminjaman = peminjamanLabModel::count();
        return view('dashboard/dashboard', compact('users', 'prodi', 'lab', 'peminjaman'));
    }
}
