<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\PreviewSuratController;
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
    Route::view('/admin', 'admin.login'); //Lanjut ke views admin

    // ====================================================================== //

    // ----- Views Warga ----- //

        // Menu Profil Desa
        Route::view('/pengumuman-warga', 'warga.profil_desa.pengumuman');
        Route::view('/tentang-desa-rawapanjang', 'warga.profil_desa.tentang-desa');
        Route::view('/agenda-rawapanjang', 'warga.profil_desa.agenda');
        Route::view('/lapak-warga', 'warga.profil_desa.lapak');
        Route::view('/artikel-terkini', 'warga.profil_desa.artikel-terkini');

        // Masuk Menu Layanan Mandiri

        Route::get('/login', [LoginController::class, 'showNikForm'])->name('login');
        Route::post('/login/check-nik', [LoginController::class, 'checkNik'])->name('login.checkNik');
        Route::get('/login/pin/{nik}', [LoginController::class, 'showPinForm'])->name('login.showPinForm');
        Route::post('/login/check-pin', [LoginController::class, 'checkPin'])->name('login.checkPin');
        Route::get('/pilih-surat', [LoginController::class, 'showMenu'])->name('pilih-surat');

        // Layanan Mandiri - Input Form Surat
        Route::get('/surat-keterangan-domisili', [SuratController::class, 'form_Surat_Keterangan_Domisili']);
        Route::get('/surat-keterangan-pengantar', [SuratController::class, 'form_Surat_Keterangan_Pengantar']);
        Route::get('/surat-keterangan-ktp-dalam-proses', [SuratController::class, 'form_Surat_Keterangan_KTP_Dalam_Proses']);
        
        
        Route::post('/submitForm', [SuratController::class, 'submitForm']);
        Route::get('/konfirmasi', [SuratController::class, 'konfirmasi']);
        Route::post('/submitSurat', [SuratController::class, 'submitSurat']);
        Route::get('/berhasil', [SuratController::class, 'berhasil']);
        // Route::view('/surat-keterangan-domisili', 'warga.layanan-mandiri.form-surat.surat-keterangan-domisili');

        // Layanan Mandiri - Preview Surat
        Route::get('/skd', [PreviewSuratController::class, 'skd']);
        Route::get('/skp', [PreviewSuratController::class, 'skp']);
        Route::get('/skck', [PreviewSuratController::class, 'skck']);
        Route::get('/skktpdp', [PreviewSuratController::class, 'skktpdp']);
        Route::get('/spkk', [PreviewSuratController::class, 'spkk']);
        Route::get('/sppkk', [PreviewSuratController::class, 'sppkk']);
        Route::get('/skwh', [PreviewSuratController::class, 'skwh']);

        // Layanan Mandiri - Verifikasi Surat
        // Route::view('/verifikasi', 'warga.layanan-mandiri.verif_surat');
        // Route::view('/berhasil', 'warga.layanan-mandiri.berhasil');

    // ----- Ends of Views Warga ----- //

    // ====================================================================== //

    // ----- Views Admin Desa ----- //

        Route::view('/beranda', 'admin.beranda');
        Route::view('/info-desa', 'admin.info-desa');
        Route::view('/data-warga', 'admin.data-warga');
        Route::view('/statistik', 'admin.statistik');
        Route::view('/pengumuman', 'admin.pengumuman');
        Route::view('/artikel-desa', 'admin.artikel-desa');
        Route::view('/agenda', 'admin.agenda');
        Route::view('/pengaturan-akun', 'admin.pengaturan-akun');

        // Layanan Surat
            Route::view('/layanan-surat', 'admin.layanan-surat.dalam-proses');
            Route::view('/surat-ditolak', 'admin.layanan-surat.surat-ditolak');
            Route::view('/riwayat-surat', 'admin.layanan-surat.riwayat-surat');
            Route::view('/kelola-surat', 'admin.layanan-surat.kelola-surat');

        // Proses Surat
            Route::view('/verif-admin', 'admin.layanan-surat.proses-surat.verif-admin');
            Route::view('/persetujuan-kades', 'admin.layanan-surat.proses-surat.persetujuan-kades');
            Route::view('/surat-selesai', 'admin.layanan-surat.proses-surat.surat-selesai');

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