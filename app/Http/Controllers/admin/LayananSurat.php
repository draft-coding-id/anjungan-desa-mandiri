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
        $belumDiverifikasiAdmin = Surat::BelumDiverifikasiAdmin()->paginate(5);
        $belumDiverifikasiKades = Surat::BelumDiverifikasiKades()->paginate(10);
        $belumDikirimKeWarga = Surat::BelumDikirimkanKeWarga()->paginate(10);
        $suratSelesai = Surat::suratSelesai()->get();
        $increment = 1;
        $incrementForTableBelumTtdKades = 1;
        $incrementForTableBelumDiserahkan = 1;
        return view('admin.layanan-surat.dalam-proses', [
            // 'skDomisilis' => $skDomisilis,
            'belumDiverifikasiAdmin' => $belumDiverifikasiAdmin,
            'belumDiverifikasiKades' => $belumDiverifikasiKades,
            'belumDikirimKeWarga' => $belumDikirimKeWarga,
            'increment' => $increment,
            'incrementForTableBelumTtdKades' => $incrementForTableBelumTtdKades,
            'incrementForTableBelumDiserahkan' => $incrementForTableBelumDiserahkan,
        ]);
    }

    public function verifikasiAdmin($id)
    {
        $surat = Surat::find($id);
        return view('admin.layanan-surat.proses-surat.verif-admin', [
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
        return redirect()->route('layanan-surat.index');
    }

    // Untuk meng Get surat yang sudah selesai
    public function suratSelesai($id)
    {
        $surat = Surat::find($id);
        return view('admin.layanan-surat.proses-surat.surat-selesai', [
            'surat' => $surat,
        ]);
    }

    /**
     * KirimSurat
     *
     * @param  mixed $id
     * @param  mixed $request
     * @return void
     */
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
    /**
     * TAndaiDiKirim
     * Berfungsi untuk menandai surat yang telah dikirim ke warga
     * @param  mixed $id
     * @return void
     */
    public function tandaiDikirim($id)
    {
        $surat = Surat::find($id);
        $surat->update([
            'is_send_to_warga' => true,
            'is_selesai' => true,
            'status' => 'Surat Selesai dan telah dikirimkan melalui whatsapp',
            'updated_at' => now(),
        ]);
        return redirect()->route('layanan-surat.index');
    }

    /**
     * TandaiCetak
     * Berfungsi untuk menandai surat yang telah dicetak
     * @param  mixed $id
     * @return void
     */
    public function tandaiCetak($id)
    {
        $surat = Surat::find($id);
        $surat->update([
            'is_print' => true,
            'status' => 'Surat Telah Dicetak',
            'updated_at' => now(),
        ]);
        return redirect()->route('layanan-surat.index');
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
        return redirect()->route('layanan-surat.index');
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
    public function suratDitolak($id, Request $request)
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
        return view('admin.layanan-surat.riwayat-surat', [
            'surat' => $surat,
            'increment' => $increment
        ]);
    }
}