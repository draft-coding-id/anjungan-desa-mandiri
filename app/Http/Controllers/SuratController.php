<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\ProsesSurat;
use App\Models\skDomisili;
use Exception;

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

        ProsesSurat::truncate();
        return view('warga.layanan-mandiri.form-surat.form-surat-keterangan-domisili', ['warga' => $warga]);
    }

    // Tampilkan formulir Surat Keterangan Pengantar
    public function form_Surat_Keterangan_Pengantar(Request $request)
    {
        // Data warga diambil dari session
        $warga = session('warga');
        if (!$warga) {
            return redirect()->route('login');
        }

        ProsesSurat::truncate();
        return view('warga.layanan-mandiri.form-surat.form-surat-keterangan-pengantar', ['warga' => $warga]);
    }

    // Tampilkan formulir Surat Keterangan KTP Dalam Proses
    public function form_Surat_Keterangan_KTP_Dalam_Proses (Request $request)
    {
        // Data warga diambil dari session
        $warga = session('warga');
        if (!$warga) {
            return redirect()->route('login');
        }

        ProsesSurat::truncate();
        return view('warga.layanan-mandiri.form-surat.form-surat-keterangan-ktp-dalam-proses', ['warga' => $warga]);
    }

    // Proses pengiriman data
    public function submitForm(Request $request)
    {
        try{
            $validatedData = $request->validate([
            'surat' => 'required|string',
            'warga_id' => 'required',
            'nik' => 'required|string|min:16|max:16',
            'nama_lengkap' => 'required|string|min:3|max:255',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date|before:today',
            'alamat' => 'required|string',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'keperluan' => 'required|string',
        ] , [
            'surat.required' => 'Surat harus diisi',
            'nik.required' => 'NIK harus diisi',
            'nik.min' => 'NIK harus 16 digit',
            'nik.max' => 'NIK harus 16 digit',
            'nama_lengkap.required' => 'Nama Lengkap harus diisi',
            'nama_lengkap.min' => 'Nama Lengkap minimal 3 karakter',
            'nama_lengkap.max' => 'Nama Lengkap maksimal 255 karakter',
            'tempat_lahir.required' => 'Tempat Lahir harus diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
            'tanggal_lahir.before' => 'Tanggal Lahir tidak valid',
            'alamat.required' => 'Alamat harus diisi',
            'rt.required' => 'RT harus diisi',
            'rw.required' => 'RW harus diisi',
            'keperluan.required' => 'Keperluan harus diisi',
        ]);
        // ProsesSurat::create($validatedData);
        // $sessionSurat = session('surat' , $validatedData);
        session(['surat' => $validatedData]);
        // return redirect()->route('preview.skd');
        return redirect('/konfirmasi');
        }catch(Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }

        // Simpan ke database

    }

    // Verifikasi Surat
    public function konfirmasi()
    {

        // $proses_surat = ProsesSurat::all(); // Ambil semua data dari tabel proses_surats
        $proses_surat = session('surat');

        return view('warga.layanan-mandiri.verif_surat', ['proses_surat' => $proses_surat]);
    }

    public function berhasil($noHp)
    {
        skDomisili::create([
            'nama_lengkap' => session('surat')['nama_lengkap'],
            'nik' => session('surat')['nik'],
            'tempat_lahir' => session('surat')['tempat_lahir'],
            'tanggal_lahir' => session('surat')['tanggal_lahir'],
            'kewarganegaraan' => "WNI",
            'alamat' => session('surat')['alamat'],
            'rt' => session('surat')['rt'],
            'rw' => session('surat')['rw'],
            'desa' => "Rawapanjang",
            'no_hp' => $noHp,
            'keperluan' => session('surat')['keperluan']
        ]);
        session()->forget('surat');
        return view('warga.layanan-mandiri.berhasil');
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
