<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;

class SuratController extends Controller
{
    public function showForm(Request $request)
    {
        // Misalkan kita menggunakan NIK untuk mengambil data warga
        $nik = $request->nik; // pastikan NIK dikirim dari halaman sebelumnya
        $warga = Warga::where('nik', $nik)->firstOrFail();

        // Kirim data warga ke view
        return view('surat_digital.skd', compact('warga'));
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'keperluan' => 'required|string|max:255'
        ]);

        // Lakukan penyimpanan atau pemrosesan data
        // Misalnya simpan ke tabel pengajuan surat

        return redirect()->route('home')->with('success', 'Pengajuan surat berhasil disimpan!');
    }
}
