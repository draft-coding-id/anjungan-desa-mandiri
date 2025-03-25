<?php


namespace App\Jobs;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

/**
 * MakePdf
 */
class MakePdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $surat;
    protected $fileName;

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
    }


    /**
     * Handle
     *
     * @return void
     */
    public function handle(): void
    {
        if ($this->surat->jenis_surat == 'SKD') {
            $pdf = Pdf::loadView('admin.layanan-surat.surat-domisili-ttd-kades', ['surat' => $this->surat]);
        } elseif ($this->surat->jenis_surat == "SKP") {
            $pdf = Pdf::loadView('admin.layanan-surat.surat-keterangan-pengantar-ttd-kades', ['surat' => $this->surat]);
        } elseif ($this->surat->jenis_surat == "SKWH") {
            $pdf = Pdf::loadView('admin.layanan-surat.surat_ket_wali_hakim-ttd-kades', ['surat' => $this->surat]);
        } elseif ($this->surat->jenis_surat == 'SKN') {
            $pdf = Pdf::loadView('admin.preview-surat.surat_ket_nikah', ['surat' => $this->surat]);
        } elseif ($this->surat->jenis_surat == 'SKTM') {
            $pdf = Pdf::loadView('admin.preview-surat.surat_ket_tidak_mampu', ['surat' => $this->surat]);
        } else {
            $pdf = Pdf::loadView('admin.preview-surat.surat_ket_domisili',  ['surat' => $this->surat]);
        }
        $pdf->render();
        $output = $pdf->output();
        file_put_contents(public_path('surat/' . $this->fileName . '.pdf'), $output);
    }
}