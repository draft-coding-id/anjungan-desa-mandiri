<?php


namespace App\Jobs;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * MakePdf
 */
class MakePdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $surat;
    protected $fileName;
    protected $qrCode;
    /**
     * __construct
     *
     * @param  mixed $surat
     * @param  mixed $fileName
     * @return void
     */
    public function __construct($surat, $fileName)
    {
        $this->surat = $surat;
        $this->fileName = $fileName;
        $this->qrCode = QrCode::size(100)->generate(public_path('surat/' . $this->fileName . '.pdf'));
    }


    /**
     * Handle
     *
     * @return void
     */
    public function handle(): void
    {
        if ($this->surat->jenis_surat == 'SKD') {
            $pdf = Pdf::loadView('admin.layanan-surat.surat-domisili-ttd-kades', ['surat' => $this->surat, 'qrCode' => $this->qrCode]);
        } elseif ($this->surat->jenis_surat == 'SKP') {
            $pdf = Pdf::loadView('admin.layanan-surat.skp-ttd-kades', ['surat' => $this->surat, 'qrCode' => $this->qrCode]);
        } elseif ($this->surat->jenis_surat == 'SKPP') {
            $pdf = Pdf::loadView('admin.layanan-surat.skpp-ttd-kades', ['surat' => $this->surat, 'qrCode' => $this->qrCode]);
        } elseif ($this->surat->jenis_surat == 'SPKK') {
            $pdf = Pdf::loadView('admin.layanan-surat.spkk-ttd-kades', ['surat' => $this->surat, 'qrCode' => $this->qrCode]);
        } elseif ($this->surat->jenis_surat == 'SKKTP') {
            $pdf = Pdf::loadView('admin.layanan-surat.skktp_ttd_kades', ['surat' => $this->surat, 'qrCode' => $this->qrCode]);
        } elseif ($this->surat->jenis_surat == "SKCK") {
            $pdf = Pdf::loadView('admin.preview-surat.surat_ket_skck', ['surat' => $this->surat]);
        } elseif ($this->surat->jenis_surat == "SPKK") {
            $pdf = Pdf::loadView('admin.preview-surat.surat_ket_pengantar_spkk', ['surat' => $this->surat]);
        } elseif ($this->surat->jenis_surat == "SPPKK") {
            $pdf = Pdf::loadView('admin.preview-surat.surat_ket_pengantar_sppkk', ['surat' => $this->surat]);
        } elseif ($this->surat->jenis_surat == "SKPG") {
            $pdf = Pdf::loadView('admin.layanan-surat.surat-keterangan-pengantar-ttd-kades', ['surat' => $this->surat, 'qrCode' => $this->qrCode]);
        } elseif ($this->surat->jenis_surat == "SIK") {
            $pdf = Pdf::loadView('admin.layanan-surat.sik_ttd_kades', ['surat' => $this->surat, 'qrCode' => $this->qrCode]);
        } elseif ($this->surat->jenis_surat == "SKWH") {
            $pdf = Pdf::loadView('admin.layanan-surat.surat_ket_wali_hakim-ttd-kades', ['surat' => $this->surat, 'qrCode' => $this->qrCode]);
        } elseif ($this->surat->jenis_surat == "SKK") {
            $pdf = Pdf::loadView('admin.layanan-surat.surat_ket_kematian-ttd-kades', ['surat' => $this->surat, 'qrCode' => $this->qrCode]);
        } elseif ($this->surat->jenis_surat == "SKW") {
            $pdf = Pdf::loadView('admin.layanan-surat.skw-ttd-kades', ['surat' => $this->surat, 'qrCode' => $this->qrCode]);
        } elseif ($this->surat->jenis_surat == "SKM") {
            $pdf = Pdf::loadView('admin.layanan-surat.skm-ttd-kades', ['surat' => $this->surat, 'qrCode' => $this->qrCode]);
        } elseif ($this->surat->jenis_surat == 'SKN') {
            $pdf = Pdf::loadView('admin.preview-surat.surat_ket_nikah', ['surat' => $this->surat]);
        } elseif ($this->surat->jenis_surat == 'SKTM') {
            $pdf = Pdf::loadView('admin.layanan-surat.sktm-ttd-kades', ['surat' => $this->surat, 'qrCode' => $this->qrCode]);
        } elseif ($this->surat->jenis_surat == 'SPPKK') {
            $pdf = Pdf::loadView('admin.layanan-surat.surat-permohonan-perubahan-kk-ttd-kades', ['surat' => $this->surat, 'qrCode' => $this->qrCode]);
        } elseif ($this->surat->jenis_surat == 'SPMAK') {
            $pdf = Pdf::loadView('admin.layanan-surat.surat_pernyataan_membuat_akta_kelahiran-ttd-kades', ['surat' => $this->surat, 'qrCode' => $this->qrCode]);
        } elseif ($this->surat->jenis_surat == 'SPJD') {
            $pdf = Pdf::loadView('admin.layanan-surat.surat_pernyataan_janda_duda-ttd-kades', ['surat' => $this->surat, 'qrCode' => $this->qrCode]);
        } else {
            $pdf = Pdf::loadView('admin.preview-surat.surat_ket_domisili',  ['surat' => $this->surat]);
        }
        $pdf->render();
        $output = $pdf->output();
        file_put_contents(public_path('surat/' . $this->fileName . '.pdf'), $output);
    }
}