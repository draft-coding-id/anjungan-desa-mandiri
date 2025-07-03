<?php

namespace App\Http\Controllers\admin;

use App\Models\Warga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_warga = Warga::paginate(10);
        return view('admin.data-warga', ['data_warga' => $data_warga]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function tambahWarga(Request $request)
    {
        $wargaStore = Warga::create([
            'nik' => $request->nik,
            'pin' => $request->pin,
            'nama_lengkap' => $request->nama,
            'pekerjaan' => $request->pekerjaan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'usia' => $request->usia,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'no_hp' => $request->no_hp,
        ]);
        $wargaStore->save();
        return redirect()->route('data-warga');
    }

    /**
     * Display the specified resource.
     */
    public function showWarga(string $id)
    {
        $warga = Warga::findOrFail($id);
        return json_encode($warga);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateWarga(Request $request)
    {
        $warga = Warga::findOrFail($request->id_warga);
        $warga->update([
            'nik' => $request->nik,
            'pin' => $request->pin,
            'nama_lengkap' => $request->nama,
            'pekerjaan' => $request->pekerjaan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'usia' => $request->usia,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'rt' => $request->rt, 
            'rw' => $request->rw,
        ]);
        return redirect()->route('data-warga');
    }
}
