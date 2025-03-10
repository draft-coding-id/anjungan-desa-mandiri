<?php

// app/Http/Controllers/SuratController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProsesSurat;

class PreviewSuratController extends Controller
{
    public function skd()
    {
        // Ambil data yang diperlukan dari database
        // Misalnya, $data = Model::find($id);
        // $proses_surat = ProsesSurat::all(); // Ambil semua data dari tabel proses_surats
        $proses_surat = session('surat');
        // dd($proses_surat);
        // dd($proses_surat);
        return view('warga.layanan-mandiri.preview-surat.surat_ket_domisili', ['proses_surat' => $proses_surat]);
    }

    public function skp()
    {
        $proses_surat = ProsesSurat::all();

        return view('warga.layanan-mandiri.preview-surat.surat_ket_pengantar', ['proses_surat' => $proses_surat]);
    }

    public function skck()
    {
        $proses_surat = ProsesSurat::all();

        return view('warga.layanan-mandiri.preview-surat.surat_ket_catatan_kriminal', ['proses_surat' => $proses_surat]);
    }

    public function skktpdp()
    {
        $proses_surat = ProsesSurat::all();

        return view('warga.layanan-mandiri.preview-surat.surat_ket_ktp_dlm_proses', ['proses_surat' => $proses_surat]);
    }

    public function spkk()
    {
        $proses_surat = ProsesSurat::all();

        return view('warga.layanan-mandiri.preview-surat.surat_permohonan_kk', ['proses_surat' => $proses_surat]);
    }

    public function sppkk()
    {
        $proses_surat = ProsesSurat::all();

        return view('warga.layanan-mandiri.preview-surat.surat_permohonan_perubahan_kk', ['proses_surat' => $proses_surat]);
    }

    public function skwh()
    {
        $proses_surat = ProsesSurat::all();

        return view('warga.layanan-mandiri.preview-surat.surat_ket_wali_hakim', ['proses_surat' => $proses_surat]);
    }
}