<?php
namespace App\Http\Controllers;

class PreviewSuratController extends Controller
{
    protected $proses_surat;

    public function __construct()
    {
        $this->proses_surat = session('surat');
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
        return view('warga.layanan-mandiri.preview-surat.skp', [
            'proses_surat' => $this->proses_surat
        ]);
    }


    public function skpg()
    {
        return view('warga.layanan-mandiri.preview-surat.surat_ket_pengantar', [
            'proses_surat' => $this->proses_surat
        ]);
    }
    public function sik()
    {
        return view('warga.layanan-mandiri.preview-surat.surat_izin_keramaian', [
            'proses_surat' => $this->proses_surat
        ]);
    }

    public function sktm(){
        return view('warga.layanan-mandiri.preview-surat.surat_ket_tidak_mampu', [
            'proses_surat' => $this->proses_surat
        ]);
    }

    public function skwh()
    {
        return view('warga.layanan-mandiri.preview-surat.surat_ket_wali_hakim', [
            'proses_surat' => $this->proses_surat
        ]);
    }

    public function skw()
    {
        return view('warga.layanan-mandiri.preview-surat.skw', [
            'proses_surat' => $this->proses_surat
        ]);
    }

    public function skk()
    {
        return view('warga.layanan-mandiri.preview-surat.surat_ket_kematian', [
            'proses_surat' => $this->proses_surat
        ]);
    }
}
