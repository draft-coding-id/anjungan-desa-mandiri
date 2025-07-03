<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warga;
use App\Models\ProsesSurat;
use App\Models\skDomisili;
use App\Models\Surat;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    //Menampilkan histori dan progres pengajuan surat
    public function histori_progres_surat()
    {
        $surats = Surat::where('warga_id', auth()->guard('warga')->user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('warga.layanan-mandiri.histori_progres_surat', compact('surats'));
    }

    // Tampilkan formulir Surat Keterangan Domisili
    public function form_Surat_Keterangan_Domisili(Request $request)
    {
        // Data warga diambil dari session
        $warga = auth()->guard('warga')->user();
        if (!$warga) {
            return redirect()->route('login');
        }
        return view('warga.layanan-mandiri.form-surat.form-surat-keterangan-domisili', ['warga' => $warga]);
    }

    // Tampilkan formulir Surat Keterangan Pengantar
    public function form_Surat_Keterangan_Pengantar(Request $request)
    {
        // Data warga diambil dari session
        $warga = auth()->guard('warga')->user();
        if (!$warga) {
            return redirect()->route('login');
        }
        return view('warga.layanan-mandiri.form-surat.form-surat-keterangan-pengantar', ['warga' => $warga]);
    }

    // Tampilkan formulir Surat Keterangan KTP Dalam Proses
    public function form_Surat_Keterangan_KTP_Dalam_Proses(Request $request)
    {
        // Data warga diambil dari session
        $warga = auth()->guard('warga')->user();

        if (!$warga) {
            return redirect()->route('login');
        }
        return view('warga.layanan-mandiri.form-surat.form-surat-keterangan-ktp-dalam-proses', ['warga' => $warga]);
    }

    public function form_surat_keterangan_wali_hakim(Request $request)
    {
        // Data warga diambil dari session
        $warga = auth()->guard('warga')->user();
        if (!$warga) {
            return redirect()->route('login');
        }
        return view('warga.layanan-mandiri.form-surat.form-surat-keterangan-wali-hakim', ['warga' => $warga]);
    }

    public function form_surat_keterangan_kematian(Request $request)
    {
        $warga = auth()->guard('warga')->user();

        if (!$warga) {
            return redirect()->route('login');
        }
        return view('warga.layanan-mandiri.form-surat.form-surat-keterangan-kematian', ['warga' => $warga]);
    }

    // Proses pengiriman data
    public function submitForm(Request $request)
    {
        try {
            if ($request->jenis_surat == "SKD") {
                $validatedData = $request->validate([
                    'jenis_surat' => 'required|string',
                    'warga_id' => 'required',
                    'nik' => 'required|string|min:16|max:16',
                    'no_kk' => 'required|string|min:16|max:16',
                    'no_hp' => 'required|string',
                    'nama_lengkap' => 'required|string|min:3|max:255',
                    'tempat_lahir' => 'required|string',
                    'tanggal_lahir' => 'required|date|before:today',
                    'alamat' => 'required|string',
                    'rt' => 'required|numeric',
                    'rw' => 'required|numeric',
                    'keperluan' => 'required|string',
                    'file' => 'required|file|mimes:pdf,doc,docx|max:4096',
                ], [
                    'file.required' => 'File harus diunggah',
                    'file.max' => 'Ukuran file maksimal 4MB',
                    'jenis_surat.required' => 'Surat harus diisi',
                    'nik.required' => 'NIK harus diisi',
                    'nik.min' => 'NIK harus 16 digit',
                    'nik.max' => 'NIK harus 16 digit',
                    'no_kk.required' => 'Nomor Kartu Keluarga harus diisi',
                    'no_kk.min' => 'Nomor Kartu Keluarga harus 16 digit',
                    'no_kk.max' => 'Nomor Kartu Keluarga harus 16 digit',
                    'nama_lengkap.required' => 'Nama Lengkap harus diisi',
                    'nama_lengkap.min' => 'Nama Lengkap minimal 3 karakter',
                    'nama_lengkap.max' => 'Nama Lengkap maksimal 255 karakter',
                    'tempat_lahir.required' => 'Tempat Lahir harus diisi',
                    'tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
                    'tanggal_lahir.before' => 'Tanggal Lahir tidak valid',
                    'alamat.required' => 'Alamat harus diisi',
                    'rt.required' => 'RT harus diisi',
                    'rw.required' => 'RW harus diisi',
                    'keperluan.required' => 'Keperluan harus diisi',
                ]);

                if ($request->hasFile('file')) {
                    $file = $request->file('file');

                    // Simpan nama dan path ke validatedData
                    $validatedData['file_tmp_name'] = $file->getClientOriginalName();
                    $validatedData['file_tmp_path'] = $file->storeAs(
                        'temp',
                        time() . '_' . $file->getClientOriginalName(),
                        'public'
                    );

                    // Hapus objek file agar tidak ikut disimpan di session
                    unset($validatedData['file']);
                }
            } elseif ($request->jenis_surat == "SKP") {
                $validatedData = $request->validate([
                    'jenis_surat' => 'required|string',
                    'warga_id' => 'required',
                    'KK' => 'required|string|min:16|max:16',
                    'nik' => 'required|string|min:16|max:16',
                    'no_hp' => 'required|string',
                    'nama_lengkap' => 'required|string|min:3|max:255',
                    'tempat_lahir' => 'required|string',
                    'tanggal_lahir' => 'required|date|before:today',
                    'jenis_kelamin' => 'required|string',
                    'warga_negara' => 'required|string',
                    'agama' => 'required|string',
                    'usia' => 'required|string',
                    'pekerjaan' => 'required|string',
                    'gol_darah' => 'required|string',
                    'kecamatan' => 'required|string',
                    'desa' => 'required|string',
                    'alamat' => 'required|string',
                    'rt' => 'required|numeric',
                    'rw' => 'required|numeric',
                    'keperluan' => 'required|string',
                    'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:4096',
                ], [
                    'file.required' => 'File harus diunggah',
                    'file.max' => 'Ukuran file maksimal 4MB',
                    'jenis_surat.required' => 'Surat harus diisi',
                    'KK.required' => 'Nomor KK harus diisi',
                    'KK.min' => 'Nomor KK harus 16 digit',
                    'KK.max' => 'Nomor KK harus 16 digit',
                    'nik.required' => 'NIK harus diisi',
                    'nik.min' => 'NIK harus 16 digit',
                    'nik.max' => 'NIK harus 16 digit',
                    'nama_lengkap.required' => 'Nama Lengkap harus diisi',
                    'nama_lengkap.min' => 'Nama Lengkap minimal 3 karakter',
                    'nama_lengkap.max' => 'Nama Lengkap maksimal 255 karakter',
                    'tempat_lahir.required' => 'Tempat Lahir harus diisi',
                    'tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
                    'tanggal_lahir.before' => 'Tanggal Lahir tidak valid',
                    'jenis_kelamin.required' => 'Jenis Kelamin harus diisi',
                    'warga_negara.required' => 'Warga Negara harus diisi',
                    'agama.required' => 'Agama harus diisi',
                    'usia.required' => 'Usia harus diisi',
                    'usia.numeric' => 'Usia harus angka',
                    'pekerjaan.required' => 'Pekerjaan harus diisi',
                    'gol_darah.required' => 'Golongan Darah harus diisi',
                    'kecamatan.required' => 'Kecamatan harus diisi',
                    'desa.required' => 'Desa harus diisi',
                    'alamat.required' => 'Alamat harus diisi',
                    'rt.required' => 'RT harus diisi',
                    'rw.required' => 'RW harus diisi',
                    'keperluan.required' => 'Keperluan harus diisi',
                ]);

                if ($request->hasFile('file')) {
                    $file = $request->file('file');

                    // Simpan nama dan path ke validatedData
                    $validatedData['file_tmp_name'] = $file->getClientOriginalName();
                    $validatedData['file_tmp_path'] = $file->storeAs(
                        'temp',
                        time() . '_' . $file->getClientOriginalName(),
                        'public'
                    );

                    // Hapus objek file agar tidak ikut disimpan di session
                    unset($validatedData['file']);
                }
            } elseif ($request->jenis_surat == "SKWH") {
                $validatedData = $request->validate([
                    'jenis_surat' => 'required|string',
                    'keperluan' => 'required|string',
                    'warga_id' => 'required',
                    'nik' => 'required|string|min:16|max:16',
                    'no_hp' => 'required|string',
                    'nama_lengkap' => 'required|string|min:3|max:255',
                    'tempat_lahir' => 'required|string',
                    'tanggal_lahir' => 'required|date|before:today',
                    'jenis_kelamin' => 'required|string',
                    'kewarganegaraan' => 'required|string',
                    'agama' => 'required|string',
                    'pekerjaan' => 'required|string',
                    'kecamatan' => 'required|string',
                    'desa' => 'required|string',
                    'rt' => 'required|string',
                    'rw' => 'required|string',
                    'alamat' => 'required|string',
                    'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:4096',
                ], [
                    'file.required' => 'File harus diunggah',
                    'file.max' => 'Ukuran file maksimal 4MB',
                    'jenis_surat.required' => 'Surat harus diisi',
                    'nik.required' => 'NIK harus diisi',
                    'nik.min' => 'NIK harus 16 digit',
                    'nik.max' => 'NIK harus 16 digit',
                    'nama_lengkap.required' => 'Nama Lengkap harus diisi',
                    'nama_lengkap.min' => 'Nama Lengkap minimal 3 karakter',
                    'nama_lengkap.max' => 'Nama Lengkap maksimal 255 karakter',
                    'tempat_lahir.required' => 'Tempat Lahir harus diisi',
                    'tanggal_lahir.required' => 'Tanggal Lahir harus diisi',
                    'tanggal_lahir.before' => 'Tanggal Lahir tidak valid',
                    'jenis_kelamin.required' => 'Jenis Kelamin harus diisi',
                    'kewarganegaraan.required' => 'Kewarganegaraan harus diisi',
                    'agama.required' => 'Agama harus diisi',
                    'pekerjaan.required' => 'Pekerjaan harus diisi',
                    'kecamatan.required' => "Kecamatan harus diisi",
                    'desa.required' => 'Desa harus diisi',
                    'alamat.required' => 'Alamat harus diisi',
                    'rt.required' => 'rt harus diisi',
                    'rw.required' => 'rw harus diisi',
                ]);

                if ($request->hasFile('file')) {
                    $file = $request->file('file');

                    // Simpan nama dan path ke validatedData
                    $validatedData['file_tmp_name'] = $file->getClientOriginalName();
                    $validatedData['file_tmp_path'] = $file->storeAs(
                        'temp',
                        time() . '_' . $file->getClientOriginalName(),
                        'public'
                    );

                    // Hapus objek file agar tidak ikut disimpan di session
                    unset($validatedData['file']);
                }
            } elseif ($request->jenis_surat == "SKK") {
                $validatedData = $request->validate([
                    // Data dasar
                    'jenis_surat' => 'required|string',
                    'warga_id' => 'required',

                    // Data Pemohon
                    'nama_lengkap' => 'required|string|min:3|max:255',
                    'nik' => 'required|string|min:16|max:16',
                    'tempat_lahir' => 'required|string',
                    'tanggal_lahir' => 'required|date|before:today',
                    'jenis_kelamin' => 'required|string',
                    'agama' => 'required|string',
                    'pekerjaan' => 'required|string',
                    'kewarganegaraan' => 'required|string',
                    'alamat' => 'required|string',
                    'no_hp' => 'required|string',
                    'rt' => 'required',
                    'rw' => 'required',
                    // Data Almarhum/Almarhumah
                    'almarhum_nama' => 'required|string|min:3|max:255',
                    'almarhum_nik' => 'required|string|min:16|max:16',
                    'almarhum_tempat_lahir' => 'required|string',
                    'almarhum_tanggal_lahir' => 'required|date|before:today',
                    'almarhum_jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
                    'almarhum_agama' => 'required|string|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
                    'almarhum_pekerjaan' => 'nullable|string',
                    'almarhum_kewarganegaraan' => 'required|string|in:WNI,WNA',
                    'almarhum_alamat' => 'required|string',

                    // Data Kematian
                    'tanggal_meninggal' => 'required|date|before_or_equal:today',
                    'tempat_meninggal' => 'required|string',
                    'sebab_kematian' => 'nullable|string',

                    // Hubungan dengan Almarhum
                    'hubungan_keluarga' => 'required|string|in:Ayah,Ibu,Suami,Istri,Anak,Saudara,Keponakan,Lainnya',
                    'keterangan_hubungan' => 'nullable|string|required_if:hubungan_keluarga,Lainnya',

                    // Keperluan
                    'keperluan' => 'required|string|in:Administrasi Pemakaman,Klaim Asuransi,Pengurusan Warisan,Administrasi Bank,Lainnya',
                    'keterangan_keperluan' => 'nullable|string',

                    // Dokumen Pendukung
                    'file' => 'nullable|file|max:4096',
                ], [
                    // Error messages untuk data pemohon
                    'nama_lengkap.required' => 'Nama pemohon harus diisi',
                    'nama_lengkap.min' => 'Nama pemohon minimal 3 karakter',
                    'nama_lengkap.max' => 'Nama pemohon maksimal 255 karakter',
                    'nik.required' => 'NIK pemohon harus diisi',
                    'nik.min' => 'NIK pemohon harus 16 digit',
                    'nik.max' => 'NIK pemohon harus 16 digit',
                    'tempat_lahir.required' => 'Tempat lahir pemohon harus diisi',
                    'tanggal_lahir.required' => 'Tanggal lahir pemohon harus diisi',
                    'tanggal_lahir.before' => 'Tanggal lahir pemohon tidak valid',
                    'jenis_kelamin.required' => 'Jenis kelamin pemohon harus diisi',
                    'agama.required' => 'Agama pemohon harus diisi',
                    'pekerjaan.required' => 'Pekerjaan pemohon harus diisi',
                    'kewarganegaraan.required' => 'Kewarganegaraan pemohon harus diisi',
                    'alamat.required' => 'Alamat pemohon harus diisi',
                    'no_hp.required' => 'No HP pemohon harus diisi',
                    'rt.required' => 'RT pemohon harus diisi',
                    'rw.required' => 'RW pemohon harus diisi',

                    // Error messages untuk data almarhum
                    'almarhum_nama.required' => 'Nama almarhum/almarhumah harus diisi',
                    'almarhum_nama.min' => 'Nama almarhum/almarhumah minimal 3 karakter',
                    'almarhum_nama.max' => 'Nama almarhum/almarhumah maksimal 255 karakter',
                    'almarhum_nik.required' => 'NIK almarhum/almarhumah harus diisi',
                    'almarhum_nik.min' => 'NIK almarhum/almarhumah harus 16 digit',
                    'almarhum_nik.max' => 'NIK almarhum/almarhumah harus 16 digit',
                    'almarhum_tempat_lahir.required' => 'Tempat lahir almarhum/almarhumah harus diisi',
                    'almarhum_tanggal_lahir.required' => 'Tanggal lahir almarhum/almarhumah harus diisi',
                    'almarhum_tanggal_lahir.before' => 'Tanggal lahir almarhum/almarhumah tidak valid',
                    'almarhum_jenis_kelamin.required' => 'Jenis kelamin almarhum/almarhumah harus diisi',
                    'almarhum_jenis_kelamin.in' => 'Jenis kelamin almarhum/almarhumah tidak valid',
                    'almarhum_agama.required' => 'Agama almarhum/almarhumah harus diisi',
                    'almarhum_agama.in' => 'Agama almarhum/almarhumah tidak valid',
                    'almarhum_kewarganegaraan.required' => 'Kewarganegaraan almarhum/almarhumah harus diisi',
                    'almarhum_kewarganegaraan.in' => 'Kewarganegaraan almarhum/almarhumah tidak valid',
                    'almarhum_alamat.required' => 'Alamat almarhum/almarhumah harus diisi',

                    // Error messages untuk data kematian
                    'tanggal_meninggal.required' => 'Tanggal meninggal harus diisi',
                    'tanggal_meninggal.before_or_equal' => 'Tanggal meninggal tidak boleh melebihi hari ini',
                    'waktu_meninggal.date_format' => 'Format waktu meninggal tidak valid (HH:MM)',
                    'tempat_meninggal.required' => 'Tempat meninggal harus diisi',

                    // Error messages untuk hubungan keluarga
                    'hubungan_keluarga.required' => 'Hubungan keluarga harus diisi',
                    'hubungan_keluarga.in' => 'Hubungan keluarga tidak valid',
                    'keterangan_hubungan.required_if' => 'Keterangan hubungan harus diisi jika memilih "Lainnya"',

                    // Error messages untuk keperluan
                    'keperluan.required' => 'Keperluan surat harus diisi',
                    'keperluan.in' => 'Keperluan surat tidak valid',

                    // Error messages untuk file
                    'file.file' => 'File KK harus berupa file',
                    'file.max' => 'Ukuran file KK maksimal 4MB',
                ]);

                // Handle file upload jika ada
                if ($request->hasFile('file')) {
                    $file = $request->file('file');

                    // Simpan nama dan path ke validatedData
                    $validatedData['file_tmp_name'] = $file->getClientOriginalName();
                    $validatedData['file_tmp_path'] = $file->storeAs(
                        'temp',
                        time() . '_' . $file->getClientOriginalName(),
                        'public'
                    );

                    // Hapus objek file agar tidak ikut disimpan di session
                    unset($validatedData['file']);
                }
            }

            session(['surat' => $validatedData]);
            return redirect('/konfirmasi');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Verifikasi Surat
    public function konfirmasi()
    {
        $proses_surat = session('surat');
        // Mapping jenis surat
        $jenis_surat_mapping = [
            'SKD' => 'Surat Keterangan Domisili',
            'SKP' => 'Surat Keterangan Pengantar',
            'SKTM' => 'Surat Keterangan KTP Dalam Proses',
            'SKWH' => 'Surat Keterangan Wali Hakim',
            'SKK' => 'Surat Keterangan Kematian',
        ];

        $proses_surat['nama_jenis_surat'] = $jenis_surat_mapping[$proses_surat['jenis_surat']] ?? 'Jenis Surat Tidak Dikenal';

        return view('warga.layanan-mandiri.verif_surat', ['proses_surat' => $proses_surat]);
    }

    public function berhasil()
    {
        $data = session('surat');
        // Jika ada file_tmp_path, pindahkan ke folder permanen
        if (isset($data['file_tmp_path'])) {
            $oldPath = storage_path("app/public/" . $data['file_tmp_path']);
            $jenisSurat = preg_replace('/[^A-Za-z0-9_\-]/', '', $data['jenis_surat']);
            $filename = time() . '_' . $data['file_tmp_name'];
            $newPath = 'uploads/surat/' . $jenisSurat . '/file/' . $filename;

            // Pindahkan file dari temp ke folder permanen
            if (file_exists($oldPath)) {
                Storage::disk('public')->move($data['file_tmp_path'], $newPath);
                $data['file_path'] = $newPath;
            }

            // Hapus data temporary dari array
            unset($data['file_tmp_path'], $data['file_tmp_name']);
        }

        $noHp = $data['no_hp'] ?? null;

        // Simpan ke database
        Surat::create([
            'warga_id' => $data['warga_id'],
            'jenis_surat' => $data['jenis_surat'],
            'isi_surat' => $data,
            'file' => $data['file_path'],
            'no_hp' => $noHp
        ]);

        session()->forget('surat');
        return view('warga.layanan-mandiri.berhasil');
    }
}
