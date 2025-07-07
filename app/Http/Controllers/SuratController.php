<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
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
    public $warga;
    public function __construct(){
        $this->warga = auth()->guard('warga')->user();
    }

    //Menampilkan histori dan progres pengajuan surat
    public function histori_progres_surat()
    {
        if (!$this->warga) {
            return redirect()->route('login-warga');
        }
        $surats = Surat::where('warga_id', $this->warga->id)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('warga.layanan-mandiri.histori_progres_surat', compact('surats'));
    }

    public function layananUmum()
    {
        if (!$this->warga) {
            return redirect()->route('login-warga');
        }
        $jenisSurat = JenisSurat::where('kategori_surat', 'Layanan Umum')->get();
        return view('warga.layanan-mandiri.layanan_umum', compact('jenisSurat'));
    }

    public function layananKependudukan()
    {
        if (!$this->warga) {
            return redirect()->route('login-warga');
        }
        $jenisSurat = JenisSurat::where('kategori_surat', 'Layanan Kependudukan')->get();
        return view('warga.layanan-mandiri.layanan_kependudukan', compact('jenisSurat'));
    }

    public function layananPernikahan()
    {
        if (!$this->warga) {
            return redirect()->route('login-warga');
        }
        $jenisSurat = JenisSurat::where('kategori_surat', 'Layanan Pernikahan')->get();
        return view('warga.layanan-mandiri.layanan_pernikahan', compact('jenisSurat'));
    }

    public function layananCatatanSipil()
    {
        if (!$this->warga) {
            return redirect()->route('login-warga');
        }
        $jenisSurat = JenisSurat::where('kategori_surat', 'Layanan Catatan Sipil')->get();
        return view('warga.layanan-mandiri.layanan_catatan_sipil', compact('jenisSurat'));
    }

    // Tampilkan formulir Surat Keterangan Domisili
    public function form_Surat_Keterangan_Domisili()
    {
        if (!$this->warga) {
            return redirect()->route('login-warga');
        }
        return view('warga.layanan-mandiri.form-surat.form-surat-keterangan-domisili', ['warga' => $this->warga]);
    }

    public function form_Surat_Keterangan_KTP_Dalam_Proses()
    {
        if (!$this->warga) {
            return redirect()->route('login-warga');
        }
        return view('warga.layanan-mandiri.form-surat.form-surat-keterangan-ktp-dalam-proses', ['warga' => $this->warga]);
    }

    public function form_skp(){
        if (!$this->warga) {
            return redirect()->route('login-warga');
        }
        return view('warga.layanan-mandiri.form-surat.form-skp', ['warga' => $this->warga]);
    }

    public function form_Surat_Keterangan_Pengantar()
    {
        if (!$this->warga) {
            return redirect()->route('login-warga');
        }
        return view('warga.layanan-mandiri.form-surat.form-surat-keterangan-pengantar', ['warga' => $this->warga]);
    }

    public function form_sktm(){
        if (!$this->warga) {
            return redirect()->route('login-warga');
        }
        return view('warga.layanan-mandiri.form-surat.form-surat-keterangan-tidak-mampu', ['warga' => $this->warga]);
    }

    public function form_Surat_Izin_Keramaian()
    {
        if (!$this->warga) {
            return redirect()->route('login-warga');
        }
        return view('warga.layanan-mandiri.form-surat.form-surat-izin-keramaian', ['warga' => $this->warga]);
    }

    public function form_surat_keterangan_wali_hakim()
    {
        if (!$this->warga) {
            return redirect()->route('login-warga');
        }
        return view('warga.layanan-mandiri.form-surat.form-surat-keterangan-wali-hakim', ['warga' => $this->warga]);
    }
    public function form_skw()
    {
        if (!$this->warga) {
            return redirect()->route('login-warga');
        }
        return view('warga.layanan-mandiri.form-surat.form-surat-keterangan-wali', ['warga' => $this->warga]);
    }

    public function form_surat_keterangan_kematian()
    {
        if (!$this->warga) {
            return redirect()->route('login-warga');
        }
        return view('warga.layanan-mandiri.form-surat.form-surat-keterangan-kematian', ['warga' => $this->warga]);
    }

    // Proses pengiriman data
    public function submitForm(Request $request)
    {
        try {
            $jenisSurat = $request->jenis_surat;

            // Validasi berdasarkan jenis surat
            switch ($jenisSurat) {
                case 'SKD':
                    $validatedData = $this->validateSkd($request);
                    break;
                case "SKP" :
                    $validatedData = $this->validateSkp($request);
                    break;
                case 'SKKTP':
                    $validatedData = $this->validateSkktp($request);
                    break;
                case 'SKN':
                    $validatedData = $this->validateSkn($request);
                    break;
                case 'SKTM':
                    $validatedData = $this->validateSktm($request);
                    break;
                case 'SKPG':
                    $validatedData = $this->validateSkpg($request);
                    break;
                case 'SIK':
                    $validatedData = $this->validateSik($request);
                    break;
                case 'SKW' :
                    $validatedData = $this->validateSkw($request);
                    break;
                case 'SKWH':
                    $validatedData = $this->validateSkwh($request);
                    break;
                case 'SKK':
                    $validatedData = $this->validateSkk($request);
                    break;
                default:
                    return redirect()->back()->with('error', 'Jenis surat tidak valid');
            }

            // Handle file upload jika ada
            $validatedData = $this->handleFileUpload($request, $validatedData);

            // Simpan ke session
            session(['surat' => $validatedData]);

            return redirect('/konfirmasi');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Validasi SKD (Surat Keterangan Domisili)
    private function validateSkd(Request $request)
    {
        return $request->validate([
            'jenis_surat' => 'required|string',
            'warga_id' => 'required',
            'nik' => 'required|string|min:16|max:16',
            'nama_lengkap' => 'required|string|min:3|max:255',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date|before:today',
            'alamat' => 'required|string',
            // Field yang harus diinput user
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'no_hp' => 'required|string',
            'keperluan' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ], $this->getValidationMessages());
    }

    // Validasi Surat Keterangan Penduduk
    private function validateSkp(Request $request){
        return $request->validate([
            'jenis_surat' => 'required|string',
            'warga_id' => 'required|exists:warga,id',
            'nik' => 'required|string|min:16|max:16',
            'no_kk' => 'required|string|min:16|max:16',
            'nama_lengkap' => 'required|string|min:3|max:255',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'pekerjaan' => 'required|string|min:3|max:100',
            'kewarganegaraan' => 'required|string|min:3|max:50',
            'agama' => 'required|string|min:3|max:50',
            'tempat_lahir' => 'required|string|min:3|max:100',
            'tanggal_lahir' => 'required|date|before:today',
            'rt' => 'required|numeric|min:1|max:20',
            'rw' => 'required|numeric|min:1|max:20',
            'kecamatan' => 'required|string|min:3|max:100',
            'desa' => 'required|string|min:3|max:100',
            'alamat' => 'required|string|min:10|max:500',
            'no_hp' => 'required|string|regex:/^08[0-9]{8,12}$/',
            'keperluan' => 'required|string',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ], $this->getValidationMessages());
    }

    // Validasi SKKTP (Surat Keterangan KTP Dalam Proses)
    private function validateSkktp(Request $request)
    {
        return $request->validate([
            'jenis_surat' => 'required|string',
            'warga_id' => 'required',
            'nik' => 'required|string|min:16|max:16',
            'nama_lengkap' => 'required|string|min:3|max:255',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date|before:today',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'agama' => 'required|string',
            'status_kawin' => 'required|string',
            'pekerjaan' => 'required|string',
            'kewarganegaraan' => 'required|string',
            // Field yang harus diinput user
            'desa' => 'required|string',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'no_hp' => 'required|string',
            'keperluan' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ], $this->getValidationMessages());
    }

    // Validasi SKN (Surat Keterangan Nikah)
    private function validateSkn(Request $request)
    {
        return $request->validate([
            'jenis_surat' => 'required|string',
            'warga_id' => 'required',
            // Field yang harus diinput user
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'no_hp' => 'required|string',
            'keperluan' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ], $this->getValidationMessages());
    }

    // Validasi SKTM (Surat Keterangan Tidak Mampu)
    private function validateSktm(Request $request)
    {
        return $request->validate([
            'jenis_surat' => 'required|string',
            'warga_id' => 'required',
            'nik' => 'required|string|min:16|max:16',
            'nama_lengkap' => 'required|string|min:3|max:255',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date|before:today',
            'jenis_kelamin' => 'required|string',
            'alamat' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
            'kewarganegaraan' => 'required|string',
            // Field yang harus diinput user
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'desa' => 'required',
            'no_hp' => 'required|string',
            'keperluan' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ], $this->getValidationMessages());
    }

    // Validasi SKP (Surat Keterangan Pengantar)
    private function validateSkpg(Request $request)
    {
        return $request->validate([
            'jenis_surat' => 'required|string',
            'warga_id' => 'required',
            'no_kk' => 'required|string|min:16|max:16',
            'nik' => 'required|string|min:16|max:16',
            'nama_lengkap' => 'required|string|min:3|max:255',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date|before:today',
            'jenis_kelamin' => 'required|string',
            'kewarganegaraan' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
            'gol_darah' => 'required|string',
            'kecamatan' => 'required|string',
            'desa' => 'required|string',
            'alamat' => 'required|string',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            // Field yang harus diinput user
            'no_hp' => 'required|string',
            'keperluan' => 'required|string',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ], $this->getValidationMessages());
    }

    private function validateSik(Request $request){
        return $request->validate([
            'jenis_surat' => 'required|string',
            'warga_id' => 'required',
            'nik' => 'required|string|min:16|max:16',
            'no_kk' => 'required|string|min:16|max:16',
            'nama_lengkap' => 'required|string|min:3|max:255',
            'status_kawin' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date|before:today',
            'jenis_kelamin' => 'required|string',
            'pendidikan' => 'required|string',
            'kewarganegaraan' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
            'alamat' => 'required|string',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'desa' => 'required|string',
            'kecamatan' => 'required|string',
            // tambahan 
            'kepala_keluarga' => 'required|string',
            'jenis_keramaian' => 'required|string',
            'tanggal_kegiatan' => 'required|date',
            // Field yang harus diinput user
            'no_hp' => 'required|string',
            'keperluan' => 'required|string',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ], $this->getValidationMessages());
    }

    // Validasi SKWH (Surat Keterangan Wali Hakim)
    private function validateSkwh(Request $request)
    {
        return $request->validate([
            'jenis_surat' => 'required|string',
            'warga_id' => 'required',
            'nik' => 'required|string|min:16|max:16',
            'nama_lengkap' => 'required|string|min:3|max:255',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date|before:today',
            'jenis_kelamin' => 'required|string',
            'kewarganegaraan' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
            'kecamatan' => 'required|string',
            'desa' => 'required|string',
            'alamat' => 'required|string',
            // Field yang harus diinput user
            'no_hp' => 'required|string',
            'keperluan' => 'required|string',
            'file' => 'nullable|file|mimes:pdf|max:2048',
        ], $this->getValidationMessages());
    }

    private function validateSkw(Request $request)
    {
        return $request->validate([
            // Data dasar
            'jenis_surat' => 'required|string',
            'warga_id' => 'required',

            // Data Pemohon
            'nama_lengkap' => 'required|string|min:3|max:255',
            'nik' => 'required|string|min:16|max:16',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date|before:today',
            'jenis_kelamin' => 'required|string',
            'desa' => 'required|string',
            'kecamatan' => 'required|string',
            'alamat' => 'required|string',

            // Data Wali
            'wali_nama' => 'required|string|min:3|max:255',
            'wali_nik' => 'required|string|min:16|max:16',
            'wali_tempat_lahir' => 'required|string',
            'wali_tanggal_lahir' => 'required|date|before:today',
            'wali_jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'wali_pekerjaan' => 'required|string',
            'wali_alamat' => 'required|string',

            // Hubungan dengan Wali
            'hubungan_keluarga' => 'required|string|in:Ayah,Ibu,Suami,Istri,Anak,Saudara,Keponakan,Lainnya',

            // Field yang harus diinput user
            'rt' => 'required',
            'rw' => 'required',
            'no_hp' => 'required|string',
            'keperluan' => 'required|string',
            'file' => 'nullable|file|max:2048',
        ], $this->getValidationMessages());
    }

    // Validasi SKK (Surat Keterangan Kematian)
    private function validateSkk(Request $request)
    {
        return $request->validate([
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

            // Field yang harus diinput user
            'rt' => 'required',
            'rw' => 'required',
            'no_hp' => 'required|string',
            'keperluan' => 'required|string|in:Administrasi Pemakaman,Klaim Asuransi,Pengurusan Warisan,Administrasi Bank,Lainnya',
            'keterangan_keperluan' => 'nullable|string',
            'file' => 'nullable|file|max:2048',
        ], $this->getValidationMessages());
    }

    // Handle file upload
    private function handleFileUpload(Request $request, array $validatedData)
    {
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

        return $validatedData;
    }

    // Pesan validasi yang umum digunakan
    private function getValidationMessages()
    {
        return [
            'file.max' => 'Ukuran file maksimal 2MB',
            'jenis_surat.required' => 'Jenis surat harus diisi',
            'nik.required' => 'NIK harus diisi',
            'nik.min' => 'NIK harus 16 digit',
            'nik.max' => 'NIK harus 16 digit',
            'nama_lengkap.required' => 'Nama lengkap harus diisi',
            'nama_lengkap.min' => 'Nama lengkap minimal 3 karakter',
            'nama_lengkap.max' => 'Nama lengkap maksimal 255 karakter',
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'tanggal_lahir.before' => 'Tanggal lahir tidak valid',
            'jenis_kelamin.required' => 'Jenis kelamin harus diisi',
            'alamat.required' => 'Alamat harus diisi',
            'agama.required' => 'Agama harus diisi',
            'status_kawin.required' => 'Status Kawin harus diisi',
            'pekerjaan.required' => 'Pekerjaan harus diisi',
            'kewarganegaraan.required' => 'Kewarganegaraan harus diisi',
            'rt.required' => 'RT harus diisi',
            'rw.required' => 'RW harus diisi',
            'no_hp.required' => 'No HP harus diisi',
            'keperluan.required' => 'Keperluan harus diisi',

            // Pesan untuk data almarhum (SKK)
            'almarhum_nama.required' => 'Nama almarhum/almarhumah harus diisi',
            'almarhum_nik.required' => 'NIK almarhum/almarhumah harus diisi',
            'tanggal_meninggal.required' => 'Tanggal meninggal harus diisi',
            'tempat_meninggal.required' => 'Tempat meninggal harus diisi',
            'hubungan_keluarga.required' => 'Hubungan keluarga harus diisi',
        ];
    }

    // Verifikasi Surat
    public function konfirmasi()
    {
        $proses_surat = session('surat');
        // dd($proses_surat);
        // Mapping jenis surat
        $jenis_surat_mapping = [
            'SKD' => 'Surat Keterangan Domisili',
            'SKKTP' => 'Surat Keterangan KTP Dalam Proses',
            'SKP' => 'Surat Keterangan Penduduk',
            'SKPG' => 'Surat Keterangan Pengantar',
            'SIK' => 'Surat Izin Keramaian',
            'SKTM' => 'Surat Keterangan Tidak Mampu',
            'SKWH' => 'Surat Keterangan Wali Hakim',
            'SKW' => 'Surat Keterangan Wali',
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
        $warga = Warga::find($data['warga_id']);
        $warga->update([
            'file_kk' => $data['file_path'] ?? $warga->file_kk,
            'no_kk' => $data['no_kk'] ?? $warga->no_kk,
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
