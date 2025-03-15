<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\GeneratePDf;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\PreviewSuratController;
use App\Http\Controllers\admin\LayananSurat;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\WargaController;
// use App\Http\Controllers\Surat_Digital\skDomisiliController;

// Code Testing
Route::view('/test', '_test');
// Route::get('/warga2', [WargaController::class, 'index']);

// Route Mockup Baru
Route::view('/', 'onboarding');
Route::view('/onboarding', 'onboarding');
Route::view('/warga', 'warga.halaman_utama')->name('halaman_utama'); //Lanjut ke views warga
Route::view('/admin', 'admin.login')->name('login'); //Lanjut ke views admin

// ====================================================================== //

// ----- Views Warga ----- //
Route::get('/login', [LoginController::class, 'showNikForm'])->name('login.warga');
// Masuk Menu Layanan Mandiri
Route::post('/login/check-nik', [LoginController::class, 'checkNik'])->name('login.checkNik');
Route::get('/login/pin/{nik}', [LoginController::class, 'showPinForm'])->name('login.showPinForm');
Route::post('/login/check-pin', [LoginController::class, 'checkPin'])->name('login.checkPin');
Route::view('/pengumuman-warga', 'warga.profil_desa.pengumuman');
Route::view('/tentang-desa-rawapanjang', 'warga.profil_desa.tentang-desa');
Route::view('/agenda-rawapanjang', 'warga.profil_desa.agenda');
Route::view('/lapak-warga', 'warga.profil_desa.lapak');
Route::view('/artikel-terkini', 'warga.profil_desa.artikel-terkini');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/pilih-surat', [LoginController::class, 'showMenu'])->name('pilih-surat');
Route::controller(SuratController::class)->group(function () {
    Route::get('/surat-keterangan-domisili', 'form_Surat_Keterangan_Domisili');
    Route::get('/surat-keterangan-pengantar', 'form_Surat_Keterangan_Pengantar');
    Route::get('/surat-keterangan-ktp-dalam-proses', 'form_Surat_Keterangan_KTP_Dalam_Proses');
    Route::post('/submitForm', 'submitForm')->name('submitForm');
    Route::get('/konfirmasi', 'konfirmasi');
    // Route::post('/submitSurat', [SuratController::class, 'submitSurat']);
    Route::get('/berhasil/{no_hp}', 'berhasil');
});
// Route::view('/surat-keterangan-domisili', 'warga.layanan-mandiri.form-surat.surat-keterangan-domisili');

// Layanan Mandiri - Preview Surat
Route::get('/skd', [PreviewSuratController::class, 'skd'])->name('preview.skd');
Route::get('/skp', [PreviewSuratController::class, 'skp']);
Route::get('/skck', [PreviewSuratController::class, 'skck']);
Route::get('/skktpdp', [PreviewSuratController::class, 'skktpdp']);
Route::get('/spkk', [PreviewSuratController::class, 'spkk']);
Route::get('/sppkk', [PreviewSuratController::class, 'sppkk']);
Route::get('/skwh', [PreviewSuratController::class, 'skwh']);

// Preview Surat Admin
Route::get('/get-detail-skd/{id}', [PreviewSuratController::class, 'getDetailSkd'])->name('get-detail-skd');
Route::get('/get-detail-skp/{id}', [PreviewSuratController::class, 'getDetailSkp'])->name('get-detail-skp');
// Layanan Mandiri - Verifikasi Surat
// Route::view('/verifikasi', 'warga.layanan-mandiri.verif_surat');
// Route::view('/berhasil', 'warga.layanan-mandiri.berhasil');

// ----- Ends of Views Warga ----- //

// ====================================================================== //


// ----- Views Admin Desa ----- //
Route::post('/proses-login', [LoginController::class, 'cekAdminLogin'])->name('cek-credentials');
Route::middleware('auth')->group(function () {
    Route::view('/beranda', 'admin.beranda')->name('admin-beranda');
    Route::view('/info-desa', 'admin.info-desa')->name('info-desa');
    Route::get('/data-warga', [AdminController::class, 'getDataWarga'])->name('data-warga');
    Route::view('/statistik', 'admin.statistik')->name('statistik');
    Route::view('/pengumuman', 'admin.pengumuman')->name('pengumuman');
    Route::view('/artikel-desa', 'admin.artikel-desa')->name('artikel-desa');
    Route::view('/agenda', 'admin.agenda')->name('agenda');
    Route::view('/pengaturan-akun', 'admin.pengaturan-akun')->name('pengaturan-akun');

    // Layanan Surat
    // Route::view('/layanan-surat', 'admin.layanan-surat.dalam-proses');
    Route::get('/layanan-surat', [LayananSurat::class, 'index'])->name('layanan-surat.index');
    Route::view('/kelola-surat', 'admin.layanan-surat.kelola-surat');

    // Proses Surat
    Route::get('/surat-ditolak/', [LayananSurat::class, 'getAllSuratDitolak'])->name('surat.getAllDitolak');
    Route::post('/surat-ditolak/{idSurat}', [LayananSurat::class, 'suratDitolak'])->name('surat.ditolak');
    Route::get('/verifikasi-admin/{idSurat}', [LayananSurat::class, 'verifikasiAdmin'])->name('verifikasi.admin');
    Route::post('/verifikasi-admin/{idSurat}', [LayananSurat::class, 'diVerifikasiAdmin'])->name('diverifikasi.admin');
    Route::get('/persetujuan-kades/{idSurat}', [LayananSurat::class, 'persetujuanKades'])->name('persetujuan.kades');
    Route::post('/persetujuan-kades/{idSurat}', [LayananSurat::class, 'disetujuiKades'])->name('disetujui.kades');
    // Route::get('/print-surat/{idSurat}', [GeneratePDf::class, 'generate'])->name('generate.pdf');
    // Route::get('/tanda-tangan-surat' , [LayananSurat::class, 'tandaTanganSurat'])->name('tanda-tangan.surat');
    Route::get('/surat-selesai/{idSurat}', [LayananSurat::class, 'suratSelesai'])->name('surat.selesai');
    Route::post('/kirim-surat/{idSurat}', [LayananSurat::class, 'kirimSurat'])->name('kirimSurat');
    Route::post('/tandaiSuratdicetak/{idSurat}', [LayananSurat::class, 'tandaiCetak'])->name('tandaiSuratDicetak');
    Route::post('/tandaisudahdikirim/{idSurat}', [LayananSurat::class, 'tandaiDikirim'])->name('tandaiSuratDikirim');
    Route::post('/tandaiDiserahkan/{idSurat}', [LayananSurat::class, 'tandaiDiserahkan'])->name('tandaiSuratDiserahkan');
    Route::get('/riwayat-surat', [LayananSurat::class, 'getRiwayatSurat'])->name('riwayat.surat');
    Route::view('/surat-selesai', 'admin.layanan-surat.proses-surat.surat-selesai');
});

    // ----- Ends of Views Admin Desa ----- //




// ====================================================================== //











































// Menu Login
        // Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
        // Route::post('/login/nik', [AuthController::class, 'validateNIK']);
        // Route::post('/login/pin', [AuthController::class, 'validatePIN']);
        // Route::get('/menu', [AuthController::class, 'showMenu'])->name('menu');
        // Route::get('/login', [LoginController::class, 'showNikForm'])->name('login.showNikForm');

// Fitur utama
// -- Route::view('/', 'halaman_utama')->name('halaman_utama');
// -- Route::view('/layanan_digital', 'other.surat_digital');
// -- Route::view('/profil_desa', 'other.profil_desa');

// Preview Surat
// use -- Route::view('/skd', 'preview_surat.surat_ket_domisili');
// use -- Route::view('/skp', 'preview_surat.surat_ket_pengantar');
// use -- Route::view('/sk', 'preview_surat.surat_kuasa');

// Halaman Verifikasi Surat
// use -- Route::view('/verif', 'other.verif_surat');
// use -- Route::view('/berhasil', 'other.berhasil');

// Route::get('/preview-surat', 'SKDController@preview')->name('preview.surat');

// -- Route::get('/surat_keterangan_domisili', [skDomisiliController::class, 'showForm']);
// Route::post('/sk-domisili/submit', [skDomisiliController::class, 'submitForm']);

// -- Route::get('/surat-domisili', [SuratController::class, 'showForm'])->name('surat.showForm');
// -- Route::post('/sk-domisili/submit', [SuratController::class, 'submitForm'])->name('surat.submitForm');

// Route::get('/surat_keterangan_domisili', function () {
//     return view('surat_digital.skd');
// });

// Halaman Profil Desa
// -- Route::view('/tentang_kami', 'profil_desa.tentang_kami');
// -- Route::view('/visi_misi', 'profil_desa.visi_misi');
// -- Route::view('/sejarah_desa', 'profil_desa.sejarah_desa');
