<?php

// app/Http/Controllers/SuratController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SKDController extends Controller
{
    public function preview()
    {
        // Ambil data yang diperlukan dari database
        // Misalnya, $data = Model::find($id);
        
        return view('surat-surat.surat_ket_domisili', compact('data')); // Gantilah 'surat.preview' dengan nama file Blade Anda
    }
}