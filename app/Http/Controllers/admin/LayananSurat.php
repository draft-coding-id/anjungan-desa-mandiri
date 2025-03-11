<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Jobs\MakePdf;
use App\Models\skDomisili;
use App\Models\Surat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LayananSurat extends Controller
{
    public function index()
    {
        $belumDiverifikasiAdmin = Surat::BelumDiverifikasiAdmin()->get();
        $belumDiverifikasiKades = Surat::BelumDiverifikasiKades()->get();
        $belumDikirimKeWarga = Surat::BelumDikirimkanKeWarga()->get();
        $suratSelesai = Surat::suratSelesai()->get();
        $increment = 1;
        return view('admin.layanan-surat.dalam-proses' , [
            // 'skDomisilis' => $skDomisilis,
            'belumDiverifikasiAdmin' => $belumDiverifikasiAdmin,
            'belumDiverifikasiKades' => $belumDiverifikasiKades,
            'belumDikirimKeWarga' => $belumDikirimKeWarga,
            'increment' => $increment
        ]);
    }

    public function verifikasiAdmin($id)
    {
        $surat = Surat::find($id);
        return view('admin.layanan-surat.proses-surat.verif-admin' , [
            'surat' => $surat,
        ]);
    }

    public function diVerifikasiAdmin($id)
    {
        $surat = Surat::find($id);
        $surat->update([
            'is_verify_admin' => true,
            'status' => 'Menunggu Tanda Tangan Kades',
            'updated_at' => now(),
        ]);
        return redirect()->route('layanan-surat.index');
    }

    public function persetujuanKades($id){
        $surat = Surat::find($id);
        return view('admin.layanan-surat.proses-surat.persetujuan-kades' , [
            'surat' => $surat,
        ]);
    }

    public function disetujuiKades($id)
    {
        $surat = Surat::find($id);
        $surat->update([
            // 'is_tanda_tangan_kades' => true,
            'status' => 'Belum diserahkan Ke Warga',
            'updated_at' => now(),
        ]);
        $fileName = "surat-" . $surat->jenis_surat . "-" . $surat->warga->nik;
        MakePdf::dispatch($surat , $fileName);
        return redirect()->route('layanan-surat.index');
    }

    // Untuk meng Get surat yang sudah selesai
    public function suratSelesai($id)
    {
        $surat = Surat::find($id);
        return view('admin.layanan-surat.proses-surat.surat-selesai' , [
            'surat' => $surat,
        ]);
    }
    public function suratDikirim($id)
    {
        $surat = Surat::find($id);
        $surat->update([
            'is_selesai' => true,
            'is_send_to_warga' => true,
            'status' => 'Surat Selesai',
            'updated_at' => now(),
        ]);
        return redirect()->route('layanan-surat.index');
    }

    // Untuk Meng Get semua Surat yang di tolak
    public function getAllSuratDitolak()
    {
        $increment = 1;
        $surat = Surat::Ditolak()->get();
        return view('admin.layanan-surat.surat-ditolak' , [
            'surat' => $surat,
            'increment' => $increment
        ]);
    }
    // Untuk Post Request
    public function suratDitolak($id)
    {
        $surat = Surat::findOrfail($id);
        $surat->update([
            'is_accepted' => false,
            'updated_at' => now(),
            'status' => 'Surat Ditolak ' . Auth::user()->name,
        ]);
         return redirect()->route('layanan-surat.index');
    }

    // Untuk mendapatkan riwayat surat
    public function getRiwayatSurat()
    {
        $increment = 1;
        $surat = Surat::RiwayatSurat()->get();
        return view('admin.layanan-surat.riwayat-surat' , [
            'surat' => $surat,
            'increment' => $increment
        ]);
    }
}