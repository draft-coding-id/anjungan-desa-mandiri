<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\PreviewSuratController;
use App\Http\Controllers\admin\LayananSurat;
use App\Http\Controllers\admin\WargaController;

// Route Mockup Baru
Route::view('/', 'onboarding');
Route::view('/warga', 'warga.halaman_utama')->name('halaman_utama'); //Lanjut ke views warga
Route::get('/admin', [LoginController::class, 'showLoginPage'])->name('login'); //Lanjut ke views admin

// ====================================================================== //

// ----- Views Warga ----- //
Route::get('/login', [LoginController::class, 'showNikForm'])->name('login-warga');
Route::get('/logout-warga', [LoginController::class, 'logout'])->name('logout-warga');

Route::view('/login/pindai-ktp', 'warga.layanan-mandiri.login.pindai_ktp')->name('pindai-ktp');
Route::post('/login/check-nik', [LoginController::class, 'checkNik'])->name('login.checkNik');
Route::post('/login/scan-ktp', [LoginController::class, 'scanKtp'])->name('login.scanKtp');
Route::get('/login/pin/{nik}', [LoginController::class, 'showPinForm'])->name('login.showPinForm');
Route::post('/login/check-pin', [LoginController::class, 'checkPin'])->name('login.checkPin');
Route::view('/agenda-rawapanjang', 'warga.profil_desa.agenda');
Route::view('/lapak-warga', 'warga.profil_desa.lapak');
Route::view('/tentang-desa-rawapanjang', 'warga.profil_desa.tentang-desa')->name('sejarah-desa');
Route::view('/visi-misi', 'warga.profil_desa.visi_misi')->name('visi-misi');

Route::view('/statistik-desa', 'warga.profil_desa.statistik-desa')->name('statistik-desa');
Route::view('/kabar-pembanguan', 'warga.profil_desa.kabar_pembangunan')->name('kabar-pembangunan');

// Masuk Menu Layanan Mandiri
Route::middleware(['isAdmin'])->group(function () {
    Route::get('/dashboard', [LoginController::class, 'showDashboard'])->name('dashboard');
    Route::view('/layanan-umum', 'warga.layanan-mandiri.layanan_umum')->name('layanan-umum');
    Route::view('/layanan-kependudukan', 'warga.layanan-mandiri.layanan_kependudukan')->name('layanan-kependudukan');
    ROute::view('/layanan-pernikahan', 'warga.layanan-mandiri.layanan_pernikahan')->name('layanan-pernikahan');
    ROute::view('/layanan-catatan-sipil', 'warga.layanan-mandiri.layanan_catatan_sipil')->name('layanan-catatan-sipil');
    Route::view('/layanan-usaha', 'warga.layanan-mandiri.layanan_usaha')->name('layanan-usaha');
});

Route::controller(SuratController::class)->group(function () {
    Route::get('/histori-progres-surat', 'histori_progres_surat')->name('histori_progres_surat');
    Route::get('/surat-keterangan-domisili', 'form_Surat_Keterangan_Domisili');
    Route::get('/surat-keterangan-pengantar', 'form_Surat_Keterangan_Pengantar');
    Route::get('/surat-keterangan-ktp-dalam-proses', 'form_Surat_Keterangan_KTP_Dalam_Proses');
    Route::get('/surat-keterangan-wali-hakim', 'form_surat_keterangan_wali_hakim');
    Route::get('/surat-keterangan-kematian', 'form_surat_keterangan_kematian');
    Route::post('/submitForm', 'submitForm')->name('submitForm');
    Route::get('/konfirmasi', 'konfirmasi');
    // Route::post('/submitSurat', [SuratController::class, 'submitSurat']);
    Route::get('/berhasil', 'berhasil');
});

// Layanan Mandiri - Preview Surat
Route::get('/skd', [PreviewSuratController::class, 'skd'])->name('preview.skd');
Route::get('/skp', [PreviewSuratController::class, 'skp'])->name('preview.skp');
Route::get('/skwh', [PreviewSuratController::class, 'skwh'])->name('preview.skwh');
Route::get('/skck', [PreviewSuratController::class, 'skck'])->name('preview.skck');
Route::get('/skktpdp', [PreviewSuratController::class, 'skktpdp'])->name('preview.skktpdp');
Route::get('/spkk', [PreviewSuratController::class, 'spkk'])->name('preview.spkk');
Route::get('/sppkk', [PreviewSuratController::class, 'sppkk'])->name('preview.sppkk');
Route::get('/skwh', [PreviewSuratController::class, 'skwh'])->name('preview.skwh');
Route::get('/skk', [PreviewSuratController::class, 'skk'])->name('preview.skk');
// ----- Ends of Views Warga ----- //

// ====================================================================== //


// ----- Views Admin Desa ----- //
Route::post('/proses-login', [LoginController::class, 'cekAdminLogin'])->name('cek-credentials');
Route::middleware(['auth'])->group(function () {
    Route::get('/beranda', [AdminController::class, 'index'])->name('admin-beranda');
    Route::post('/tambah-akun', [AdminController::class, 'tambahAkun'])->name('tambah-akun');
    Route::get('/show-akun/{id}', [AdminController::class, 'showAkun'])->name('show-akun');
    Route::post('/update-akun', [AdminController::class, 'updateAkun'])->name('update-akun');
    Route::view('/info-desa', 'admin.info-desa')->name('info-desa');
    Route::get('/data-warga', [WargaController::class, 'index'])->name('data-warga');
    Route::get('/show-warga/{id}', [WargaController::class, 'showWarga'])->name('show-warga');
    Route::post('/tambah-warga', [WargaController::class, 'tambahWarga'])->name('tambah-warga');
    Route::post('/update-warga', [WargaController::class, 'updateWarga'])->name('update-warga');
    Route::view('/statistik', 'admin.statistik')->name('statistik');
    Route::view('/pengumuman', 'admin.pengumuman')->name('pengumuman');
    Route::view('/artikel-desa', 'admin.artikel-desa')->name('artikel-desa');
    Route::view('/agenda', 'admin.agenda')->name('agenda');
    Route::get('/pengaturan-akses', [AdminController::class, 'getUsers'])->name('pengaturan-akses')->middleware('permission:akses daftar akun');;


    // Layanan Surat
    // Route::view('/layanan-surat', 'admin.layanan-surat.dalam-proses');
    Route::get('/layanan-surat', [LayananSurat::class, 'index'])->name('layanan-surat-dalam-proses');
    Route::view('/kelola-surat', 'admin.layanan-surat.kelola-surat')->name('layanan-surat-kelola-surat');
    //
    Route::get('/qr-generate', [LayananSurat::class, 'qrGenerate'])->name('qrGenerate');

    //
    // Proses Surat
    Route::post('/surat-disetujui/{idSurat}', [LayananSurat::class, 'setujuiSurat'])->name('layanan-surat-dalam-proses.setujui');
    Route::get('/surat-ditolak/', [LayananSurat::class, 'getAllSuratDitolak'])->name('layanan-surat-ditolak');
    Route::post('/surat-ditolak/{idSurat}', [LayananSurat::class, 'suratDitolak'])->name('surat.ditolak');
    Route::get('/lihat-surat/{idSurat}', [LayananSurat::class, 'lihatSurat'])->name('layanan-surat-dalam-proses.lihat-surat');
    Route::get('/preview-surat/{jenisSurat}/{id}', [LayananSurat::class, 'previewSurat'])->name('preview.surat');
    Route::get('/search-surat', [LayananSurat::class, 'searchSurat'])->name('search-surat');
    Route::get('/surat-selesai/{idSurat}', [LayananSurat::class, 'suratSelesai'])->name('layanan-surat-dalam-proses-surat-selesai');
    Route::get('/kirim-surat-wa/{idSurat}', [LayananSurat::class, 'kirimWa'])->name('kirim-surat-wa');
    Route::post('/kirim-surat/{idSurat}', [LayananSurat::class, 'kirimSurat'])->name('kirimSurat');
    Route::post('/tandaiSuratdicetak/{idSurat}', [LayananSurat::class, 'tandaiCetak'])->name('tandaiSuratDicetak');
    Route::post('/tandaisudahdikirim/{idSurat}', [LayananSurat::class, 'tandaiDikirim'])->name('tandaiSuratDikirim');
    Route::post('/tandaiDiserahkan/{idSurat}', [LayananSurat::class, 'tandaiDiserahkan'])->name('tandaiSuratDiserahkan');
    Route::get('/riwayat-surat', [LayananSurat::class, 'getRiwayatSurat'])->name('layanan-surat-riwayat');
    Route::view('/surat-selesai', 'admin.layanan-surat.proses-surat.surat-selesai');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout-admin');
})->middleware('role:admin,kades,rt,rw');
    // ----- Ends of Views Admin Desa ----- //
// ====================================================================== //