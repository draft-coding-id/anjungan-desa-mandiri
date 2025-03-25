<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\GeneratePDf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\PreviewSuratController;
use App\Http\Controllers\admin\LayananSurat;
use App\Http\Controllers\admin\WargaController;

// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\WargaController;
// use App\Http\Controllers\Surat_Digital\skDomisiliController;


// Route Mockup Baru
Route::view('/', 'onboarding');
Route::view('/warga', 'warga.halaman_utama')->name('halaman_utama'); //Lanjut ke views warga
Route::view('/admin', 'admin.login')->name('login'); //Lanjut ke views admin

// ====================================================================== //

// ----- Views Warga ----- //
Route::get('/login', [LoginController::class, 'showNikForm'])->name('login.warga');
Route::view('/login/pindai-ktp', 'warga.layanan-mandiri.login.pindai_ktp')->name('pindai-ktp');
Route::post('/login/check-nik', [LoginController::class, 'checkNik'])->name('login.checkNik');
Route::post('/login/scan-ktp', [LoginController::class, 'scanKtp'])->name('login.scanKtp');
Route::get('/login/pin/{nik}', [LoginController::class, 'showPinForm'])->name('login.showPinForm');
Route::post('/login/check-pin', [LoginController::class, 'checkPin'])->name('login.checkPin');
Route::view('/pengumuman-warga', 'warga.profil_desa.pengumuman');
Route::view('/agenda-rawapanjang', 'warga.profil_desa.agenda');
Route::view('/lapak-warga', 'warga.profil_desa.lapak');
Route::view('/artikel-terkini', 'warga.profil_desa.artikel-terkini');
Route::view('/tentang-desa-rawapanjang', 'warga.profil_desa.tentang-desa')->name('sejarah-desa');
Route::view('/visi-misi', 'warga.profil_desa.visi_misi')->name('visi-misi');
Route::view('/potensi-desa', 'warga.profil_desa.potensi_desa')->name('potensi-desa');
Route::view('/statistik-desa', 'warga.profil_desa.statistik-desa')->name('statistik-desa');
Route::view('/kerjasama', 'warga.profil_desa.kerjasama')->name('kerjasama');
Route::view('/kabar-pembanguan', 'warga.profil_desa.kabar_pembangunan')->name('kabar-pembangunan');

// Masuk Menu Layanan Mandiri
Route::middleware(['isAdmin'])->group(function () {
    Route::get('/dashboard', [LoginController::class, 'showDashboard'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::view('/layanan-umum', 'warga.layanan-mandiri.layanan_umum')->name('layanan-umum');
    Route::view('/layanan-kependudukan', 'warga.layanan-mandiri.layanan_kependudukan')->name('layanan-kependudukan');
    ROute::view('/layanan-pernikahan', 'warga.layanan-mandiri.layanan_pernikahan')->name('layanan-pernikahan');
    Route::view('/layanan-usaha', 'warga.layanan-mandiri.layanan_usaha')->name('layanan-usaha');
});

Route::controller(SuratController::class)->group(function () {
    Route::get('/surat-keterangan-domisili', 'form_Surat_Keterangan_Domisili');
    Route::get('/surat-keterangan-pengantar', 'form_Surat_Keterangan_Pengantar');
    Route::get('/surat-keterangan-ktp-dalam-proses', 'form_Surat_Keterangan_KTP_Dalam_Proses');
    Route::get('/surat-keterangan-wali-hakim', 'form_surat_keterangan_wali_hakim');
    Route::post('/submitForm', 'submitForm')->name('submitForm');
    Route::get('/konfirmasi', 'konfirmasi');
    // Route::post('/submitSurat', [SuratController::class, 'submitSurat']);
    Route::get('/berhasil/{no_hp}', 'berhasil');
});
// Route::view('/surat-keterangan-domisili', 'warga.layanan-mandiri.form-surat.surat-keterangan-domisili');

// Layanan Mandiri - Preview Surat
Route::get('/skd', [PreviewSuratController::class, 'skd'])->name('preview.skd');
Route::get('/skp', [PreviewSuratController::class, 'skp']);
Route::get('/skwh', [PreviewSuratController::class, 'skwh']);
Route::get('/skck', [PreviewSuratController::class, 'skck']);
Route::get('/skktpdp', [PreviewSuratController::class, 'skktpdp']);
Route::get('/spkk', [PreviewSuratController::class, 'spkk']);
Route::get('/sppkk', [PreviewSuratController::class, 'sppkk']);
Route::get('/skwh', [PreviewSuratController::class, 'skwh']);

// Preview Surat Admin
Route::get('/get-detail-skd/{id}', [PreviewSuratController::class, 'getDetailSkd'])->name('get-detail-skd');
Route::get('/get-detail-skp/{id}', [PreviewSuratController::class, 'getDetailSkp'])->name('get-detail-skp');
Route::get('/get-detail-skwh/{id}', [PreviewSuratController::class, 'getDetailSkwh'])->name('get-detail-skwh');
// Layanan Mandiri - Verifikasi Surat
// Route::view('/verifikasi', 'warga.layanan-mandiri.verif_surat');
// Route::view('/berhasil', 'warga.layanan-mandiri.berhasil');

// ----- Ends of Views Warga ----- //

// ====================================================================== //


// ----- Views Admin Desa ----- //
Route::post('/proses-login', [LoginController::class, 'cekAdminLogin'])->name('cek-credentials');
Route::middleware(['auth'])->group(function () {
    Route::view('/beranda', 'admin.beranda')->name('admin-beranda');
    Route::view('/info-desa', 'admin.info-desa')->name('info-desa');
    Route::get('/data-warga', [WargaController::class, 'index'])->name('data-warga');
    Route::view('/statistik', 'admin.statistik')->name('statistik');
    Route::view('/pengumuman', 'admin.pengumuman')->name('pengumuman');
    Route::view('/artikel-desa', 'admin.artikel-desa')->name('artikel-desa');
    Route::view('/agenda', 'admin.agenda')->name('agenda');
    Route::view('/pengaturan-akun', 'admin.pengaturan-akun')->name('pengaturan-akun');

    // Layanan Surat
    // Route::view('/layanan-surat', 'admin.layanan-surat.dalam-proses');
    Route::get('/layanan-surat', [LayananSurat::class, 'index'])->name('layanan-surat-dalam-proses');
    Route::view('/kelola-surat', 'admin.layanan-surat.kelola-surat')->name('layanan-surat-kelola-surat');

    // Proses Surat
    Route::get('/surat-ditolak/', [LayananSurat::class, 'getAllSuratDitolak'])->name('layanan-surat-ditolak');
    Route::post('/surat-ditolak/{idSurat}', [LayananSurat::class, 'suratDitolak'])->name('surat.ditolak');
    Route::get('/verifikasi-admin/{idSurat}', [LayananSurat::class, 'verifikasiAdmin'])->name('layanan-surat-dalam-proses.verifikasi-admin');
    Route::post('/verifikasi-admin/{idSurat}', [LayananSurat::class, 'diVerifikasiAdmin'])->name('diverifikasi.admin');
    Route::get('/persetujuan-kades/{idSurat}', [LayananSurat::class, 'persetujuanKades'])->name('layanan-surat-dalam-proses.persetujuan-kades');
    Route::post('/persetujuan-kades/{idSurat}', [LayananSurat::class, 'disetujuiKades'])->name('disetujui.kades');
    // Route::get('/print-surat/{idSurat}', [GeneratePDf::class, 'generate'])->name('generate.pdf');
    // Route::get('/tanda-tangan-surat' , [LayananSurat::class, 'tandaTanganSurat'])->name('tanda-tangan.surat');
    Route::get('/surat-selesai/{idSurat}', [LayananSurat::class, 'suratSelesai'])->name('layanan-surat-dalam-proses.surat-selesai');
    Route::post('/kirim-surat/{idSurat}', [LayananSurat::class, 'kirimSurat'])->name('kirimSurat');
    Route::post('/tandaiSuratdicetak/{idSurat}', [LayananSurat::class, 'tandaiCetak'])->name('tandaiSuratDicetak');
    Route::post('/tandaisudahdikirim/{idSurat}', [LayananSurat::class, 'tandaiDikirim'])->name('tandaiSuratDikirim');
    Route::post('/tandaiDiserahkan/{idSurat}', [LayananSurat::class, 'tandaiDiserahkan'])->name('tandaiSuratDiserahkan');
    Route::get('/riwayat-surat', [LayananSurat::class, 'getRiwayatSurat'])->name('layanan-surat-riwayat');
    Route::view('/surat-selesai', 'admin.layanan-surat.proses-surat.surat-selesai');
});
    // ----- Ends of Views Admin Desa ----- //
// ====================================================================== //
