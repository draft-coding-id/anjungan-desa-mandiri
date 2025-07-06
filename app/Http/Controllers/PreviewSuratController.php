<?php

// app/Http/Controllers/SuratController.php
namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\JenisSurat;
use App\Models\ProsesSurat;
use Illuminate\Http\Request;
use App\Models\JenisSuratField;

class PreviewSuratController extends Controller
{
    protected $proses_surat;
    // public function index(){
    //     $proses_surat = session('surat');
    //     $jenisSurat = JenisSurat::where('kode', $proses_surat['jenis_surat'])->first();
    //     $proses_surat['nama_jenis_surat'] = $jenisSurat->nama;
    //     $jenisSuratField = JenisSuratField::where('jenis_surat_id', $jenisSurat->id)
    //         ->with('formFieldTemplate')
    //         ->orderBy('order')
    //         ->get();
    //     return view('warga.layanan-mandiri.preview-surat.index', ['proses_surat' => $proses_surat, 'jenisSuratField' => $jenisSuratField , 'jenisSurat' => $jenisSurat]);
    // }

    public function __construct()
    {
        // Inisialisasi di constructor
        $this->proses_surat = session('surat');

        // Atau jika ingin mengambil dari database
        // $this->proses_surat = ProsesSurat::latest()->first();
    }
    public function skd()
    {
        return view('warga.layanan-mandiri.preview-surat.surat_ket_domisili', [
            'proses_surat' => $this->proses_surat
        ]);
    }

    public function skktp()
    {
        return view('warga.layanan-mandiri.preview-surat.surat_ket_ktp_dlm_proses', [
            'proses_surat' => $this->proses_surat
        ]);
    }

    public function skp()
    {
        return view('warga.layanan-mandiri.preview-surat.surat_ket_pengantar', [
            'proses_surat' => $this->proses_surat
        ]);
    }

    public function skwh()
    {
        return view('warga.layanan-mandiri.preview-surat.surat_ket_wali_hakim', [
            'proses_surat' => $this->proses_surat
        ]);
    }

    public function skk()
    {
        return view('warga.layanan-mandiri.preview-surat.surat_ket_kematian', [
            'proses_surat' => $this->proses_surat
        ]);
    }

    public function sktm()
    {
        return view('warga.layanan-mandiri.preview-surat.surat_ket_tidak_mampu', [
            'proses_surat' => $this->proses_surat
        ]);
    }
}

    // public function getDetailSkp($id)
    // {
    //     $surat = Surat::find($id);
    //     return view('admin.preview-surat.surat_ket_pengantar', ['surat' => $surat]);
    // }
    // public function getDetailSkwh($id)
    // {
    //     $surat = Surat::find($id);
    //     return view('admin.preview-surat.surat_ket_wali_hakim', ['surat' => $surat]);
    // }
    // public function getDetailSkd($id)
    // {
    //     $surat = Surat::find($id);
    //     return view('admin.preview-surat.surat_ket_domisili', ['surat' => $surat]);
    // }


