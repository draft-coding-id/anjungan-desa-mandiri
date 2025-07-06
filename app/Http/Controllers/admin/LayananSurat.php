<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Jobs\MakePdf;
use App\Models\JenisSurat;
use App\Models\skDomisili;
use App\Models\Surat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
    public function previewDokumen($id){
        $surat = Surat::find($id); 
        $fileUrl = asset('/storage/' . $surat->file); // perhatikan perubahan ini
        
        return response()->json([
            'jenis_surat' => $surat->jenis_surat,
            'file' => $fileUrl,
        ]);
    }
    public function previewSurat($jenisSurat, $id)
    {
        $surat = Surat::find($id);
        $view = match ($jenisSurat) {
            "SKD" => 'admin.preview-surat.surat_ket_domisili',
            "SKKTP" => 'admin.preview-surat.surat_ket_ktp_dalam_proses',
            "SIK" => 'admin.preview-surat.surat_izin_keramaian',
            "SKP" => 'admin.preview-surat.surat_ket_pengantar',
            "SKWH" => 'admin.preview-surat.surat_ket_wali_hakim',
            "SKK" => 'admin.preview-surat.surat_ket_kematian',
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
            'status' => 'Telah disetujui oleh ' . Auth::user()->akses,
            'updated_at' => now(),
            'is_approve_admin' => true,
            'file_surat' => $fileName,
        ]);
        Cache::forget('beranda');

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
        $url = "https://wa.me/+62" . $surat->no_hp . "?text=" . $message;
        return redirect($url);
    }

    public function tandaiDikirim($id)
    {
        $surat = Surat::find($id);
        $surat->update([
            'is_send_to_warga' => true,
            'is_selesai' => true,
            'status' => 'Surat telah dikirim',
            'updated_at' => now(),
        ]);
        return redirect()->route('layanan-surat-dalam-proses');
    }

    public function tandaiCetak($id)
    {
        $surat = Surat::find($id);
        $surat->update([
            'is_print' => true,
            'is_selesai' => true,
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
            'status' => 'Surat Telah diserahkan kepada warga',
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
            'status' => 'Surat Ditolak Oleh ' . Auth::user()->akses,
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
    // Search surat 
    public function searchSurat(Request $request)
    {
        $search = $request->search; 
        $surat = Surat::where('no_surat', 'LIKE', '%' . $search . '%')
            ->RiwayatSurat() // jika perlu filter sama seperti getRiwayatSurat
            ->get();

        return view('admin.layanan-surat.riwayat-surat', [
            'surat' => $surat,
            'increment' => 1,
            'search' => $search // untuk menampilkan kembali keyword pencarian
        ]);
    }

    public function indexKelolaSurat()
    {
        $jenisSurats = JenisSurat::paginate(10);

        return view('admin.layanan-surat.kelola-surat.index', compact('jenisSurats'));
    }

    public function storeKelolaSurat(Request $request)
    {
        // dd($request);

        JenisSurat::create([
            'nama_surat' => $request->nama_surat,
            'kategori_surat' => $request->kategori_surat,
            'kode_surat' => $request->kode_surat,
        ]);

        return redirect()->route('kelola-surat.index');
    }

    public function editKelolaSurat($id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);
        return response()->json($jenisSurat);
    }

    public function updateKelolaSurat(Request $request, $id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);

        $jenisSurat->update([
            'nama_surat' => $request->nama_surat,
            'kategori_surat' => $request->kategori_surat,
            'kode_surat' => $request->kode_surat,
        ]);

        return redirect()->route('kelola-surat.index')->with('success', 'Data berhasil diperbarui.');
    }


    public function destroyKelolaSurat($id)
    {
        $jenisSurat = JenisSurat::find($id);

        $jenisSurat->delete();

        return redirect()->route('kelola-surat.index');
    }

    public function showKelolaSurat($id)
    {
        $jenisSurat = JenisSurat::findOrFail($id);
        $kodeSurat = $jenisSurat->kode_surat;

        // dd($jenisSurat);

        if ($kodeSurat == 'SKD') {
            $fields = [
                ['label' => 'Nama Lengkap', 'name' => '[nama]'],
                ['label' => 'NIK / NO KTP', 'name' => '[no_ktp]'],
                ['label' => 'Tempat/Tanggal Lahir', 'name' => '[tempat_tanggal_lahir]'],
                ['label' => 'Jenis Kelamin', 'name' => '[jenis_kelamin]'],
                ['label' => 'Agama', 'name' => '[agama]'],
                ['label' => 'Status', 'name' => '[status]'],
                ['label' => 'Pendidikan', 'name' => '[pendidikan]'],
                ['label' => 'Pekerjaan', 'name' => '[pekerjaan]'],
                ['label' => 'Kewarganegaraan', 'name' => '[kewarganegaraan]'],
                ['label' => 'Alamat/Tempat Tinggal', 'name' => '[alamat_jalan] RT [rt] RW [rw] Dusun [dusun] Desa [nama_des] Kecamatan [nama_kec] Kabupaten Bogor'],
            ];
        } else if ($kodeSurat == 'SKKTP') {
            $fields = [
                ['label' => 'Nama Lengkap', 'name' => '[nama]'],
                ['label' => 'Tempat/Tanggal Lahir', 'name' => '[tempat_tanggal_lahir]'],
                ['label' => 'Alamat/Tempat Tinggal', 'name' => '[alamat_jalan] RT [rt] RW [rw] Dusun [dusun] Desa [nama_des] Kecamatan [nama_kec] Kabupaten Bogor'],
                ['label' => 'Agama', 'name' => '[agama]'],
                ['label' => 'Status', 'name' => '[status]'],
                ['label' => 'Pekerjaan', 'name' => '[pekerjaan]'],
                ['label' => 'Kewarganegaraan', 'name' => '[kewarganegaraan]'],
            ];
        } else if ($kodeSurat == 'SKP') {
            $fields = [
                ['label' => 'Nama Lengkap', 'name' => '[nama]'],
                ['label' => 'NIK / NO KTP', 'name' => '[no_ktp]'],
                ['label' => 'Tempat/Tanggal Lahir', 'name' => '[tempat_tanggal_lahir]'],
                ['label' => 'Jenis Kelamin', 'name' => '[jenis_kelamin]'],
                ['label' => 'Agama', 'name' => '[agama]'],
                ['label' => 'Status', 'name' => '[status]'],
                ['label' => 'Pendidikan', 'name' => '[pendidikan]'],
                ['label' => 'Pekerjaan', 'name' => '[pekerjaan]'],
                ['label' => 'Kewarganegaraan', 'name' => '[kewarganegaraan]'],
                ['label' => 'Alamat/Tempat Tinggal', 'name' => '[alamat_jalan] RT [rt] RW [rw] Dusun [dusun] Desa [nama_des] Kecamatan [nama_kec] Kabupaten Bogor'],
            ];
        } else if ($kodeSurat == 'SIK') {
            $fields = [
                ['label' => 'Nama Lengkap', 'name' => '[nama]'],
                ['label' => 'NIK / NO KTP', 'name' => '[no_ktp]'],
                ['label' => 'No. KK', 'name' => '[no_kk]'],
                ['label' => 'Kepala Keluarga', 'name' => '[kepala_kk]'],
                ['label' => 'Tempat/Tanggal Lahir', 'name' => '[tempat_tanggal_lahir]'],
                ['label' => 'Jenis Kelamin', 'name' => '[jenis_kelamin]'],
                ['label' => 'Alamat/Tempat Tinggal', 'name' => '[alamat_jalan] RT [rt] RW [rw] Dusun [dusun] Desa [nama_des] Kecamatan [nama_kec] Kabupaten Bogor'],
                ['label' => 'Agama', 'name' => '[agama]'],
                ['label' => 'Status', 'name' => '[status]'],
                ['label' => 'Pendidikan', 'name' => '[pendidikan]'],
                ['label' => 'Pekerjaan', 'name' => '[pekerjaan]'],
                ['label' => 'Kewarganegaraan', 'name' => '[kewarganegaraan]'],
                ['label' => 'Keperluan', 'name' => 'Sebagai pengantar untuk mendapatkan Surat Izin Keramaian berupa [form_jenis_keramaian] mulai tanggal [form_berlaku_dari] sampai dengan [form_berlaku_sampai] dengan keperluan [form_keperluan].'],
            ];
        } else if ($kodeSurat == 'SKK') {
            $fields = [
                ['label' => 'Nama Lengkap', 'name' => '[nama]'],
                ['label' => 'NIK / NO KTP', 'name' => '[no_ktp]'],
                ['label' => 'Tempat/Tanggal Lahir', 'name' => '[tempat_tanggal_lahir]'],
                ['label' => 'Jenis Kelamin', 'name' => '[jenis_kelamin]'],
                ['label' => 'Agama', 'name' => '[agama]'],
                ['label' => 'Pekerjaan', 'name' => '[pekerjaan]'],
                ['label' => 'Kewarganegaraan', 'name' => '[kewarganegaraan]'],
                ['label' => 'Alamat/Tempat Tinggal', 'name' => '[alamat_jalan] RT [rt] RW [rw] Dusun [dusun] Desa [nama_des] Kecamatan [nama_kec] Kabupaten Bogor'],
            ];
        } else if ($kodeSurat == 'SKM') {
            $fields = [
                ['label' => 'Nama Lengkap', 'name' => '[nama]'],
                ['label' => 'NIK / NO KTP', 'name' => '[no_ktp]'],
                ['label' => 'Tempat/Tanggal Lahir', 'name' => '[tempat_tanggal_lahir]'],
                ['label' => 'Jenis Kelamin', 'name' => '[jenis_kelamin]'],
                ['label' => 'Agama', 'name' => '[agama]'],
                ['label' => 'Status', 'name' => '[status]'],
                ['label' => 'Pekerjaan', 'name' => '[pekerjaan]'],
                ['label' => 'Alamat/Tempat Tinggal', 'name' => '[alamat_jalan] RT [rt] RW [rw] Dusun [dusun] Desa [nama_des] Kecamatan [nama_kec] Kabupaten Bogor'],
            ];
        } else if ($kodeSurat == 'SKPG') {
            $fields = [
                ['label' => 'Nama Lengkap', 'name' => '[nama]'],
                ['label' => 'Tempat/Tanggal Lahir', 'name' => '[tempat_tanggal_lahir]'],
                ['label' => 'Umur', 'name' => '[umur]'],
                ['label' => 'Warga Negara', 'name' => '[warga_negara]'],
                ['label' => 'Agama', 'name' => '[agama]'],
                ['label' => 'Jenis Kelamin', 'name' => '[jenis_kelamin]'],
                ['label' => 'Pekerjaan', 'name' => '[pekerjaan]'],
                ['label' => 'Tempat Tinggal', 'name' => '[alamat_jalan] RT [rt] RW [rw] Dusun [dusun] Desa [nama_des] Kecamatan [nama_kec] Kabupaten Bogor'],
                ['label' => 'NO KTP', 'name' => '[no_ktp]'],
                ['label' => 'NO KK', 'name' => '[no_kk]'],
                ['label' => 'Keperluan', 'name' => '[keperluan]'],
                ['label' => 'Berlaku', 'name' => '[mulai_berlaku] s/d [tgl_akhir]'],
                ['label' => 'Golongan Darah', 'name' => '[gol_darah]'],
            ];
        } else if ($kodeSurat == 'SKPP') {
            $fields = [
                ['label' => 'Nama Lengkap', 'name' => '[nama]'],
                ['label' => 'NIK / NO KTP', 'name' => '[no_ktp]'],
                ['label' => 'No. KK', 'name' => '[no_kk]'],
                ['label' => 'Kepala Keluarga', 'name' => '[nama_kep]'],
                ['label' => 'Tempat/Tanggal Lahir', 'name' => '[tempat_tanggal_lahir]'],
                ['label' => 'Jenis Kelamin', 'name' => '[jenis_kelamin]'],
                ['label' => 'Alamat/Tempat Tinggal', 'name' => '[alamat_jalan] RT [rt] RW [rw] Dusun [dusun] Desa [nama_des] Kecamatan [nama_kec] Kabupaten Bogor'],
                ['label' => 'Status', 'name' => '[status_kwn]'],
                ['label' => 'Pendidikan', 'name' => '[pendidikan]'],
                ['label' => 'Pekerjaan', 'name' => '[pekerjaan]'],
                ['label' => 'Jumlah Keluarga Pindah', 'name' => '[jum_nik]'],
                ['label' => 'Alasan Kepindahan', 'name' => '[alasan]'],
            ];
        } else if ($kodeSurat == 'SKTM') {
            $fields = [
                ['label' => 'Nama Lengkap', 'name' => '[nama]'],
                ['label' => 'NO KTP', 'name' => '[no_ktp]'],
                ['label' => 'Tempat/Tanggal Lahir', 'name' => '[tempat_tanggal_lahir]'],
                ['label' => 'Jenis Kelamin', 'name' => '[jenis_kelamin]'],
                ['label' => 'Kewarganegaraan', 'name' => '[kewarganegaraan]'],
                ['label' => 'Agama', 'name' => '[agama]'],
                ['label' => 'Pekerjaan', 'name' => '[pekerjaan]'],
                ['label' => 'Tempat Tinggal', 'name' => '[alamat_jalan] RT [rt] RW [rw] Dusun [dusun] Desa [nama_des] Kecamatan [nama_kec] Kabupaten Bogor'],
            ];
        } else if ($kodeSurat == 'SKWH') {
            $fields = [
                ['label' => 'Nama Lengkap', 'name' => '[nama]'],
                ['label' => 'NIK / NO KTP', 'name' => '[no_ktp]'],
                ['label' => 'Tempat/Tanggal Lahir', 'name' => '[tempat_tanggal_lahir]'],
                ['label' => 'Jenis Kelamin', 'name' => '[jenis_kelamin]'],
                ['label' => 'Tempat Tinggal', 'name' => '[alamat_jalan] RT [rt] RW [rw] Dusun [dusun] Desa [nama_des] Kecamatan [nama_kec] Kabupaten Bogor'],
                ['label' => 'Agama', 'name' => '[agama]'],
                ['label' => 'Pekerjaan', 'name' => '[pekerjaan]'],
                ['label' => 'Kewarganegaraan', 'name' => '[kewarganegaraan]'],
            ];
        } else if ($kodeSurat == 'SKW') {
            $fields = [
                ['label' => 'Nama Lengkap', 'name' => '[nama]'],
                ['label' => 'NIK / NO KTP', 'name' => '[no_ktp]'],
                ['label' => 'Tempat/Tanggal Lahir', 'name' => '[tempat_tanggal_lahir]'],
                ['label' => 'Tempat Tinggal', 'name' => '[alamat_jalan] RT [rt] RW [rw] Dusun [dusun] Desa [nama_des] Kecamatan [nama_kec] Kabupaten Bogor'],
                ['label' => 'Pekerjaan', 'name' => '[pekerjaan]'],
            ];
        } else if ($kodeSurat == 'SPC') {
            $fields = [
                ['label' => 'Nama Lengkap', 'name' => '[nama]'],
                ['label' => 'NIK / NO KTP', 'name' => '[no_ktp]'],
                ['label' => 'Tempat/Tanggal Lahir', 'name' => '[tempat_tanggal_lahir]'],
                ['label' => 'Pekerjaan', 'name' => '[pekerjaan]'],
                ['label' => 'Agama', 'name' => '[agama]'],
                ['label' => 'Tempat Tinggal', 'name' => '[alamat_jalan] RT [rt] RW [rw] Dusun [dusun] Desa [nama_des] Kecamatan [nama_kec] Kabupaten Bogor'],
            ];
        } else if ($kodeSurat == 'SPKK') {
            $fields = [
                ['label' => 'Nama Lengkap', 'name' => '[nama]'],
                ['label' => 'NIK / NO KTP', 'name' => '[no_ktp]'],
                ['label' => 'Tempat/Tanggal Lahir', 'name' => '[tempat_tanggal_lahir]'],
                ['label' => 'Pekerjaan', 'name' => '[pekerjaan]'],
                ['label' => 'Agama', 'name' => '[agama]'],
                ['label' => 'Tempat Tinggal', 'name' => '[alamat_jalan] RT [rt] RW [rw] Dusun [dusun] Desa [nama_des] Kecamatan [nama_kec] Kabupaten Bogor'],
            ];
        } else if ($kodeSurat == 'SPJD') {
            $fields = [
                ['label' => 'Nama Lengkap', 'name' => '[nama]'],
                ['label' => 'NIK / NO KTP', 'name' => '[no_ktp]'],
                ['label' => 'Tempat/Tanggal Lahir', 'name' => '[tempat_tanggal_lahir]'],
                ['label' => 'Jenis Kelamin', 'name' => '[jenis_kelamin]'],
                ['label' => 'Agama', 'name' => '[agama]'],
                ['label' => 'Status', 'name' => '[status]'],
                ['label' => 'Tempat Tinggal', 'name' => '[alamat_jalan] RT [rt] RW [rw] Dusun [dusun] Desa [nama_des] Kecamatan [nama_kec] Kabupaten Bogor'],
            ];
        } else if ($kodeSurat == 'SPMAK') {
            $fields = [
                ['label' => 'Nama Lengkap', 'name' => '[nama]'],
                ['label' => 'NIK / NO KTP', 'name' => '[no_ktp]'],
                ['label' => 'Tempat/Tanggal Lahir', 'name' => '[tempat_tanggal_lahir]'],
                ['label' => 'Umur', 'name' => '[umur]'],
                ['label' => 'Pekerjaan', 'name' => '[pekerjaan]'],
                ['label' => 'Agama', 'name' => '[agama]'],
                ['label' => 'Tempat Tinggal', 'name' => '[alamat_jalan] RT [rt] RW [rw] Dusun [dusun] Desa [nama_des] Kecamatan [nama_kec] Kabupaten Bogor'],
            ];
        } else if ($kodeSurat == 'SPPKK') {
            $fields = [
                ['label' => 'Nama', 'name' => '[nama]'],
                ['label' => 'Tempat/Tanggal Lahir', 'name' => '[tempat_tanggal_lahir]'],
                ['label' => 'Umur', 'name' => '[umur]'],
                ['label' => 'Warga Negara', 'name' => '[warga_negara]'],
                ['label' => 'Agama', 'name' => '[agama]'],
                ['label' => 'Jenis Kelamin', 'name' => '[jenis_kelamin]'],
                ['label' => 'Pekerjaan', 'name' => '[pekerjaan]'],
                ['label' => 'Tempat Tinggal', 'name' => '[alamat_jalan] RT [rt] RW [rw] Dusun [dusun] Desa [nama_des] Kecamatan [nama_kec] Kabupaten Bogor'],
                ['label' => 'No KTP', 'name' => '[no_ktp]'],
                ['label' => 'No KK', 'name' => '[no_kk]'],
                ['label' => 'Keperluan', 'name' => 'Permohonan Perubahan Kartu Keluarga WNI.'],
                ['label' => 'Keterangan Lain-lain', 'name' => 'Orang tersebut di atas adalah benar benar penduduk Desa kami.'],
            ];
        } 

        $html = view('admin.layanan-surat.kelola-surat.show', [
            'jenisSurat' => $jenisSurat,
            'kodeSurat' => $kodeSurat,
            'fields' => $fields,
        ])->render();

        return response()->json(['html'=> $html]);
    }
}
