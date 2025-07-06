<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use App\Models\KategoriSurat;
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

    // Tampilkan kategori layanan kependudukan 
    public function layananKependudukan(){
        $jenisSurat = JenisSurat::where('kategori_id' , '=' , 1)->get();
        return view('warga.layanan-mandiri.layanan_kependudukan', [
            'jenisSurat' => $jenisSurat
        ]);
    }

    public function layananUmum(){
        $jenisSurat = JenisSurat::where('kategori_id' , '=' , 4)->get();
        return view('warga.layanan-mandiri.layanan_umum', [
            'jenisSurat' => $jenisSurat
        ]);
    }

    public function layananPernikahan(){
        $jenisSurat = JenisSurat::where('kategori_id' , '=' , 3)->get();
        return view('warga.layanan-mandiri.layanan_pernikahan', [
            'jenisSurat' => $jenisSurat
        ]);
    }

    public function layananCatatanSipil(){
        $jenisSurat = JenisSurat::where('kategori_id' , '=' , 2)->get();
        return view('warga.layanan-mandiri.layanan_catatan_sipil', [
            'jenisSurat' => $jenisSurat
        ]);
    }

    public function formSurat($kodeSurat){
        $jenisSurat = JenisSurat::with(['jenisSuratFields.formFieldTemplate'])
            ->where('kode', $kodeSurat)
            ->firstOrFail();

        // Ambil data warga yang login
        $warga = auth()->guard('warga')->user();


        // Filter field untuk form input (tampilkan semua kecuali Footer dan Preview)
        $formFields = $jenisSurat->jenisSuratFields->filter(function ($field) {
            return !in_array($field->formFieldTemplate->category, ['Footer', 'Preview']);
        })->sortBy('order');

        return view('warga.layanan-mandiri.form-surat.index', compact('jenisSurat', 'formFields', 'warga'));
    }


    // Proses pengiriman data
    public function submitForm($kodeSurat, Request $request)
    {
        try {
            // Validasi field yang selalu ada di semua form
            $baseRules = [
                'jenis_surat' => 'required|string',
                'warga_id' => 'required',
                'keperluan' => 'required|string',
                'no_hp' => 'required|string|regex:/^[0-9]{10,13}$/',
                'upload_kartu_keluarga' => 'nullable|file|mimes:pdf|max:2048',
            ];

            // Validasi field pemohon yang readonly (diambil dari database)
            $pemohonRules = [
                'nama_lengkap' => 'required|string|max:100',
                'nik' => 'required|string|size:16',
                'tempat_lahir' => 'required|string',
                'tanggal_lahir' => 'required|date|before:today',
                'jenis_kelamin' => 'required|string',
                'agama' => 'required|string',
                'pekerjaan' => 'required|string',
                'kewarganegaraan' => 'required|string',
                'alamat' => 'required|string',
                'rt' => 'required|string',
                'rw' => 'required|string',
                'kecamatan' => 'required|string',
                'desa' => 'required|string',
            ];

            $messages = [
                'required' => ':attribute harus diisi',
                'string' => ':attribute harus berupa text',
                'size' => ':attribute harus :size karakter',
                'max' => ':attribute maksimal :max karakter',
                'before' => ':attribute tidak valid',
                'date' => ':attribute harus berupa tanggal',
                'regex' => ':attribute format tidak valid',
                'file' => ':attribute harus berupa file',
                'mimes' => ':attribute harus berformat :values',
                'upload_kartu_keluarga.max' => 'Ukuran file maksimal 2MB',
            ];

            // Tentukan rules berdasarkan kode surat
            switch ($kodeSurat) {
                case 'SKD':
                    $rules = array_merge($baseRules, [
                        'nama_lengkap' => 'required|string|max:100',
                        'nik' => 'required|string|size:16',
                        'tempat_lahir' => 'required|string',
                        'tanggal_lahir' => 'required|date|before:today',
                        'alamat' => 'required|string',
                        'rt' => 'required|string',
                        'rw' => 'required|string',
                    ]);
                    break;

                case 'SKP':
                    $rules = array_merge($baseRules, $pemohonRules, [
                        'no_kk' => 'required|string|size:16',
                        'status_kawin' => 'required|string',
                        'pendidikan' => 'required|string',
                        'golongan_darah' => 'required|string',
                    ]);
                    break;

                case 'SKWH':
                    $rules = array_merge($baseRules, $pemohonRules);
                    break;

                case 'SKK':
                    $rules = array_merge($baseRules, $pemohonRules, [
                        // Data target (almarhum/almarhumah)
                        'target_nama' => 'required|string|max:100',
                        'target_nik' => 'required|string|size:16',
                        'target_tempat_lahir' => 'required|string',
                        'target_tanggal_lahir' => 'required|date|before:today',
                        'target_jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
                        'target_agama' => 'required|string|in:Islam,Kristen,Katolik,Hindu,Buddha,Khonghucu',
                        'target_pekerjaan' => 'nullable|string',
                        'target_kewarganegaraan' => 'required|string|in:WNI,WNA',
                        'target_alamat' => 'required|string',

                        // Data kematian
                        'tanggal_meninggal' => 'required|date|before_or_equal:today',
                        'tempat_meninggal' => 'required|string|max:100',

                        // Hubungan
                        'hubungan_terkait' => 'required|string|in:Anak,Suami,Istri,Ayah,Ibu,Saudara',
                    ]);
                    break;

                case 'SKCERAI':
                    $rules = array_merge($baseRules, $pemohonRules, [
                        'nama_suami' => 'required|string|max:100',
                        'nik_suami' => 'required|string|size:16',
                        'ttl_suami' => 'required|string',
                        'pekerjaan_suami' => 'required|string',
                        'agama_suami' => 'required|string',
                        'alamat_suami' => 'required|string',
                        'nama_istri' => 'required|string|max:100',
                        'nik_istri' => 'required|string|size:16',
                        'ttl_istri' => 'required|string',
                        'pekerjaan_istri' => 'required|string',
                        'agama_istri' => 'required|string',
                        'alamat_istri' => 'required|string',
                    ]);
                    break;

                case 'SKJD':
                    $rules = array_merge($baseRules, $pemohonRules, [
                        'status_pernyataan' => 'required|string|in:Janda,Duda',
                    ]);
                    break;

                default:
                    // Untuk surat lainnya, gunakan base rules + pemohon rules
                    $rules = array_merge($baseRules, $pemohonRules);
                    break;
            }

            // Validasi berdasarkan rules yang sudah ditentukan
            $validatedData = $request->validate($rules, $messages);

            // Handle file upload jika ada
            $fileFields = ['upload_kartu_keluarga', 'file'];
            foreach ($fileFields as $fileField) {
                if ($request->hasFile($fileField)) {
                    $file = $request->file($fileField);

                    // Simpan nama dan path ke validatedData
                    $validatedData['file_tmp_name'] = $file->getClientOriginalName();
                    $validatedData['file_tmp_path'] = $file->storeAs(
                        'temp',
                        time() . '_' . $file->getClientOriginalName(),
                        'public'
                    );

                    // Hapus objek file agar tidak ikut disimpan di session
                    unset($validatedData[$fileField]);
                    break; // Hanya ambil file pertama yang ditemukan
                }
            }

            // Simpan data ke session
            session(['surat' => $validatedData]);
            return redirect('/konfirmasi');
        }catch (Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    // Verifikasi Surat
    public function konfirmasi()
    {
        $proses_surat = session('surat');
        $jenisSurat = JenisSurat::where('kode', $proses_surat['jenis_surat'])->first();
        $proses_surat['nama_jenis_surat'] = $jenisSurat->nama;

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
        $warga = Warga::find($data['warga_id']);
        $warga->update([
            'file_kk' => $data['file_path'] ?? null,
            'no_kk' => $data['no_kk'] ?? null,
        ]);
        Surat::create([
            'warga_id' => $data['warga_id'],
            'jenis_surat' => $data['jenis_surat'],
            'isi_surat' => $data,
            'file' => $data['file_path'] ?? $warga->file_kk,
            'no_hp' => $noHp
        ]);
   

        session()->forget('surat');
        return view('warga.layanan-mandiri.berhasil');
    }
}
