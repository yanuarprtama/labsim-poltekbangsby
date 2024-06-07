<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\laporan;
use App\Models\peminjamanLabModel;
use App\Models\perawatanLab;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $data = laporan::all();
        return view('laporan/laporan', compact('data'));
    }
    public function grouping(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $validated['start_date'];
        $endDate = $validated['end_date'];

        // $tanggalMulai = Carbon::parse($request->startDate);
        // $tanggalSelesai = Carbon::parse($request->endDate);

        // $peminjaman = laporan::whereBetween('waktu_mulai', [$tanggalMulai, $tanggalSelesai])
        //     ->whereBetween('waktu_selesai', [$tanggalMulai, $tanggalSelesai])
        //     ->get();
        // $totalJam = $peminjaman->reduce(function ($carry, $item) {
        //     $waktuMulai = Carbon::parse($item->waktu_mulai);
        //     $waktuSelesai = Carbon::parse($item->waktu_selesai);
        //     return $carry + $waktuSelesai->diffInHours($waktuMulai);
        // }, 0);
        $totaljam = laporan::whereBetween('waktu_mulai', [$startDate, $endDate])->sum('total_jam');
        $data = laporan::whereBetween('waktu_mulai', [$startDate, $endDate])->get();

        return view('laporan/grouping', compact('data', 'startDate', 'endDate', 'totaljam'));
        //return view('laporan/grouping',['total_jam' => $totalJam], compact('data', 'startDate', 'endDate'));
    }
    public function lperawatan()
    {
        $data = perawatanLab::all();
        return view('laporan/lperawatan', compact('data'));
    }
    public function lgrouping(Request $request)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $validated['start_date'];
        $endDate = $validated['end_date'];

        $data = perawatanLab::whereBetween('tanggal', [$startDate, $endDate])->get();

        return view('laporan/lgrouping', compact('data', 'startDate', 'endDate'));
    }
}
