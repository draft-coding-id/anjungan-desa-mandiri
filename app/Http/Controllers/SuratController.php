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

    

    // Proses pengiriman data
    public function submitForm(Request $request)
    {
        try {
            if ($request->jenis_surat == "SKD") {
                $validatedData = $request->validate([
                    'jenis_surat' => 'required|string',
                    'warga_id' => 'required',
                    'nik' => 'required|string|min:16|max:16',
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
                    'file.mimes' => 'File harus berupa PDF, JPG, JPEG, atau PNG',
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
                        time().'_'.$file->getClientOriginalName(),
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
                    'file.mimes' => 'File harus berupa PDF, JPG, JPEG, atau PNG',
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
                        time().'_'.$file->getClientOriginalName(),
                        'public'
                    );
                    
                    // Hapus objek file agar tidak ikut disimpan di session
                    unset($validatedData['file']);
                }

            } elseif ($request->jenis_surat == "SKWH") {
                $validatedData = $request->validate([
                    'jenis_surat' => 'required|string',
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
                    'alamat' => 'required|string',
                    'file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:4096',
                ], [
                    'file.required' => 'File harus diunggah',
                    'file.mimes' => 'File harus berupa PDF, JPG, JPEG, atau PNG',
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
                    'alamat.required' => 'Alamat harus diisi',
                ]);

                if ($request->hasFile('file')) {
                    $file = $request->file('file');
                    
                    // Simpan nama dan path ke validatedData
                    $validatedData['file_tmp_name'] = $file->getClientOriginalName();
                    $validatedData['file_tmp_path'] = $file->storeAs(
                        'temp',
                        time().'_'.$file->getClientOriginalName(),
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