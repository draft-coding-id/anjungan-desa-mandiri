<?php

// app/Http/Controllers/SuratController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProsesSurat;
use App\Models\Surat;

class PreviewSuratController extends Controller
{
    public function skd()
    {
        // Mengambil session surat
        $proses_surat = session('surat');
        return view('warga.layanan-mandiri.preview-surat.surat_ket_domisili', ['proses_surat' => $proses_surat]);
    }

    public function getDetailSkd($id)
    {
        $surat = Surat::find($id);
        return view('admin.preview-surat.surat_ket_domisili', ['surat' => $surat]);
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