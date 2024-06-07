<?php

namespace App\Http\Controllers;

use App\Models\kritik;
use Illuminate\Http\Request;
use App\Models\kuisioner;

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
}
