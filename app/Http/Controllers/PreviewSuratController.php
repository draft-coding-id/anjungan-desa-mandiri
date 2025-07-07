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
    public function spmak()
    {
        return view('warga.layanan-mandiri.preview-surat.surat_pernyataan_membuat_akta_kelahiran', [
            'proses_surat' => $this->proses_surat
        ]);
    }
}
