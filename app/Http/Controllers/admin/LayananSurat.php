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
        $dalamProses = surat::DalamProses()->paginate(10);
        $belumDikirimKeWarga = Surat::BelumDikirimkanKeWarga()->paginate(10);
        $increment = 1;
        $incrementForTableBelumDiserahkan = 1;
        return view('admin.layanan-surat.dalam-proses', [
            'dalamProses' => $dalamProses,
            'belumDikirimKeWarga' => $belumDikirimKeWarga,
            'increment' => $increment,
            'incrementForTableBelumDiserahkan' => $incrementForTableBelumDiserahkan,
        ]);
    }

    public function lihatSurat($id)
    {
        $surat = Surat::find($id);
        return $surat;
    }

    public function previewSurat($jenisSurat, $id)
    {
        $surat = Surat::find($id);
        $view = match ($jenisSurat) {
            "SKD" => 'admin.preview-surat.surat_ket_domisili',
            "SKP" => 'surat.preview.skp',
            "SKWH" => 'surat.preview.skwh',
            "SKCK" => 'surat.preview.skck',
            "SKKTPDP" => 'surat.preview.skktpdp',
            "SPKK" => 'surat.preview.spkk',
            "SPPKK" => 'surat.preview.sppkk'
        };
        return view($view, [
            'surat' => $surat,
        ]);
    }

    public function setujuiSurat($id)
    {
        $surat = Surat::find($id);
        $fileName = "surat-" . $surat->jenis_surat . $surat->id . "-" . $surat->warga->nik . "-" . date('hhmmss');
        $surat->update([
            'is_accepted' => true,
            'status' => 'Telah disetujui oleh ' . Auth::user()->role,
            'updated_at' => now(),
            'is_approve_admin' => true,
            'file_surat' => $fileName,
        ]);
        MakePdf::dispatch($surat, $fileName);
        return redirect()->route('layanan-surat-dalam-proses');
    }

    public function diVerifikasiAdmin($id)
    {
        $surat = Surat::find($id);
        $surat->update([
            'is_verify_admin' => true,
            'status' => 'Menunggu Tanda Tangan Kades',
            'updated_at' => now(),
        ]);
        return redirect()->route('layanan-surat-dalam-proses');
    }

    public function persetujuanKades($id)
    {
        $surat = Surat::find($id);
        return view('admin.layanan-surat.proses-surat.persetujuan-kades', [
            'surat' => $surat,
        ]);
    }

    public function disetujuiKades($id)
    {
        $surat = Surat::find($id);

        $fileName = "surat-" . $surat->jenis_surat . $surat->id . "-" . $surat->warga->nik . "-" . date('hhmmss');
        $surat->update([
            'is_tanda_tangan_kades' => true,
            'status' => 'Belum diserahkan Ke Warga',
            'updated_at' => now(),
            'file_surat' => $fileName,
        ]);
        MakePdf::dispatch($surat, $fileName);
        return redirect()->route('layanan-surat-dalam-proses');
    }

    // Untuk meng Get surat yang sudah selesai
    public function suratSelesai($id)
    {
        $surat = Surat::find($id);
        return view('admin.layanan-surat.proses-surat.surat-selesai', [
            'surat' => $surat,
        ]);
    }
    public function kirimSurat($id, Request $request)
    {
        $message = urlencode($request->pesan_wa);
        $surat = Surat::findOrFail($id);
        $surat->update([
            'status' => 'Surat Telah Dikirim',
            'updated_at' => now(),
        ]);
        $url = "https://wa.me/" . $surat->no_hp . "?text=" . $message;
        return redirect($url);
    }

    public function tandaiDikirim($id)
    {
        $surat = Surat::find($id);
        $surat->update([
            'is_send_to_warga' => true,
            'is_selesai' => true,
            'status' => 'Surat Selesai dan telah dikirimkan melalui whatsapp',
            'updated_at' => now(),
        ]);
        return redirect()->route('layanan-surat-dalam-proses');
    }

    public function tandaiCetak($id)
    {
        $surat = Surat::find($id);
        $surat->update([
            'is_print' => true,
            'status' => 'Surat Telah Dicetak',
            'updated_at' => now(),
        ]);
        return redirect()->route('layanan-surat-dalam-proses');
    }

    public function tandaiDiserahkan($id)
    {
        $surat = Surat::find($id);
        $surat->update([
            'is_diserahkan' => true,
            'is_selesai' => true,
            'status' => 'Surat Telah Diserahkan',
            'updated_at' => now(),
        ]);
        return redirect()->route('layanan-surat-dalam-proses');
    }

    // Untuk Meng Get semua Surat yang di tolak
    public function getAllSuratDitolak()
    {
        $increment = 1;
        $surat = Surat::Ditolak()->get();
        return view('admin.layanan-surat.surat-ditolak', [
            'surat' => $surat,
            'increment' => $increment
        ]);
    }
    // Untuk Post Request
    public function suratDitolak($id,  Request $request)
    {
        $surat = Surat::findOrfail($id);
        $surat->update([
            'is_accepted' => false,
            'updated_at' => now(),
            'alasan_tolak' => $request->alasan,
            'status' => 'Surat Ditolak Oleh ' . Auth::user()->role,
        ]);
        return redirect()->route('layanan-surat-ditolak');
    }

    // Untuk mendapatkan riwayat surat
    public function getRiwayatSurat()
    {
        $increment = 1;
        $surat = Surat::RiwayatSurat()->get();
        return view('admin.layanan-surat.riwayat-surat', [
            'surat' => $surat,
            'increment' => $increment
        ]);
    }
}
