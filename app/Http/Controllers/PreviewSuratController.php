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
        $proses_surat = ProsesSurat::all(); // Ambil semua data dari tabel proses_surats

        return view('warga.layanan-mandiri.preview-surat.surat_ket_domisili', ['proses_surat' => $proses_surat]);
    }

    public function skp()
    {
        $proses_surat = ProsesSurat::all();

        return view('warga.layanan-mandiri.preview-surat.surat_ket_pengantar', ['proses_surat' => $proses_surat]);
    }
}