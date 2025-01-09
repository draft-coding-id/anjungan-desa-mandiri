<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\ProsesSurat;

class SuratController extends Controller
{
    // Tampilkan formulir Surat Keterangan Domisili
    public function form_Surat_Keterangan_Domisili(Request $request)
    {
        // Data warga diambil dari session
        $warga = session('warga');
        if (!$warga) {
            return redirect()->route('login');
        }

        return view('warga.layanan-mandiri.form-surat.surat-keterangan-domisili', ['warga' => $warga]);
    }

    // Proses pengiriman data
    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'surat' => 'required|string',
            'nik' => 'required|string',
            'nama_lengkap' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'keperluan' => 'required|string',
        ]);

        // Simpan ke database
        ProsesSurat::create($validatedData);

        return redirect('/verifikasi')->with('success', 'Data berhasil disimpan dan akan diverifikasi.');
    }

    // Verifikasi Surat
    public function verifikasi(Request $request)
    {
        $proses_surat = ProsesSurat::all(); // Ambil semua data dari tabel proses_surats

        return view('warga.layanan-mandiri.verif_surat', ['proses_surat' => $proses_surat]);
    }
}

    // public function showForm(Request $request)
    // {
    //     // Misalkan kita menggunakan NIK untuk mengambil data warga
    //     $nik = $request->nik; // pastikan NIK dikirim dari halaman sebelumnya
    //     $warga = Warga::where('nik', $nik)->firstOrFail();

    //     // Kirim data warga ke view
    //     return view('surat_digital.skd', compact('warga'));
    // }

    // public function _submitForm(Request $request)
    // {
    //     $request->validate([
    //         'keperluan' => 'required|string|max:255'
    //     ]);

    //     // Lakukan penyimpanan atau pemrosesan data
    //     // Misalnya simpan ke tabel pengajuan surat

    //     return redirect()->route('home')->with('success', 'Pengajuan surat berhasil disimpan!');
    // }