<?php

namespace App\Http\Controllers;

use App\Models\kritik;
use App\Models\kuisioner;
use App\Models\perawatanLab;
use Illuminate\Http\Request;
use App\Models\peminjamanLabModel;
use Illuminate\Support\Facades\DB;
use App\Models\peminjamanAlatModel;
use App\Http\Controllers\Controller;

class kuisionerController extends Controller
{
    public function index()
    {
        $data = kuisioner::all();
        return view('kuisioner/pertanyaan', compact('data'));
    }
    public function kritiksaran()
    {
        $data = kritik::all();
        return view('kuisioner/kritiksaran', compact('data'));
    }
    public function tambahpertanyaan()
    {
        return view('kuisioner/tambahpertanyaan');
    }
    public function prosestambahpertanyaan(Request $request)
    {
        $request->validate(
            [
                'pertanyaan'    => 'required',
                'type'          => 'required'
            ],
            [
                'pertanyaan.required' => 'Kolom pertanyaan harus diisi',
                'type.required'     => 'Kolom type harus diisi'
            ]
        );
        $data['pertanyaan'] = $request->pertanyaan;
        $data['type'] = $request->type;

        kuisioner::Create($data);
        return redirect('/pertanyaan');
    }
    public function edit(Request $request, $id)
    {
        $data = kuisioner::find($id);

        return view('kuisioner/edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $data['pertanyaan'] = $request->pertanyaan;
        $data['type'] = $request->type;

        kuisioner::whereId($id)->update($data);
        return redirect('/pertanyaan');
    }
    public function hapus(Request $request, $id)
    {
        $data = kuisioner::find($id);

        if ($data) {
            $data->delete();
        }
        return redirect('/pertanyaan');
    }
    public function hapuskritik(Request $request, $id)
    {
        $data = kuisioner::find($id);

        if ($data) {
            $data->delete();
        }
        return redirect('/kritiksaran');
    }
    public function store(Request $request)
{  
    $request->validate([
        'kritik' => 'required', 
        'saran' => 'required',
        'nomor_peminjaman' => 'required'
        ]);
    // dd($request->all());
        
    // Store the kritik and saran
        Kritik::create([
            'kritik' => $request->kritik,
            'saran' => $request->saran,
            'nomor_peminjaman' => $request->nomor_peminjaman
            ]);

            // $checkPeminjamanLab = peminjamanLabModel::where('nomor_peminjaman',$request->nomor_pemijaman)->count();
            // dd($checkPeminjamanLab);

    // Update the status of the peminjaman to "DIKEMBALIKAN"
    $peminjaman = peminjamanLabModel::where('nomor_peminjaman', $request->nomor_peminjaman)->update([
        "status"=>"DIKEMBALIKAN"
    ]);
    

    return redirect()->back()->with('success', 'Kritik dan saran berhasil dikirim dan status peminjaman telah diperbarui.');
}


}
