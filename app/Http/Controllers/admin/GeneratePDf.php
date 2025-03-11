<?php

namespace App\Http\Controllers\admin;

use App\Models\Surat;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

/**
 * GeneratePDf
 */
class GeneratePDf extends Controller
{
    /**
     * generate
     *
     * @param  mixed $surat
     * @return void
     */
    public function generate($idSurat)
    {
        $surat = Surat::find($idSurat);
        $pdf = Pdf::loadView('admin.layanan-surat.surat-domisili-ttd-kades', ['surat' => $surat]);
        $pdf->render();
        // $output = $pdf->output();
        // $pdf = Pdf::loadView('admin.layanan-surat.surat-domisili-ttd-kades');
        return $pdf->stream();
    }
}