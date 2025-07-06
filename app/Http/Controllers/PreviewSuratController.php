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

    // public function getDetailSkd($id)
    // {
    //     $surat = Surat::find($id);
    //     return view('admin.preview-surat.surat_ket_domisili', ['surat' => $surat]);
    // }

    public function skp()
    {
        $proses_surat = session('surat');

        return view('warga.layanan-mandiri.preview-surat.surat_ket_pengantar', ['proses_surat' => $proses_surat]);
    }
    // public function getDetailSkp($id)
    // {
    //     $surat = Surat::find($id);
    //     return view('admin.preview-surat.surat_ket_pengantar', ['surat' => $surat]);
    // }

    public function skwh()
    {
        $proses_surat = session('surat');

        return view('warga.layanan-mandiri.preview-surat.surat_ket_wali_hakim', ['proses_surat' => $proses_surat]);
    }

    // public function getDetailSkwh($id)
    // {
    //     $surat = Surat::find($id);
    //     return view('admin.preview-surat.surat_ket_wali_hakim', ['surat' => $surat]);
    // }

    public function skk()
    {
        $proses_surat = session('surat');
        return view('warga.layanan-mandiri.preview-surat.surat_ket_kematian', ['proses_surat' => $proses_surat]);
    }

    public function sktm(){
        $proses_surat = session('surat');
        return view('warga.layanan-mandiri.preview-surat.surat_ket_tidak_mampu', ['proses_surat' => $proses_surat]);
    }

}
