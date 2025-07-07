<?php

use App\Models\Lapak;
use App\Models\VisiMisi;
use App\Models\SejarahDesa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InformasiDesa;
use App\Http\Controllers\LapakController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KabarPembangunan;
use App\Http\Controllers\admin\LayananSurat;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\WargaController;
use App\Http\Controllers\PreviewSuratController;
use App\Models\KabarPembangunan as ModelsKabarPembangunan;

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
Route::view('/registrasi-warga', 'warga.layanan-mandiri.login.registrasi_warga')->name('registrasi-warga');
Route::post('/registrasi-warga/store', [LoginController::class, 'registerWarga'])->name('warga.register');
Route::get('/login/pin/{nik}', [LoginController::class, 'showPinForm'])->name('login.showPinForm');
Route::post('/login/check-pin', [LoginController::class, 'checkPin'])->name('login.checkPin');
Route::view('/agenda-rawapanjang', 'warga.profil_desa.agenda');
Route::get('/lapak-warga',  function () {
    $lapaks = Lapak::all();
    return view('warga.profil_desa.lapak', [
        'lapaks' => $lapaks,
    ]);
});

Route::get('/lapak-warga/detail/{id}', function ($id) {
    $lapak = Lapak::with('warga')->find($id);

    if (!$lapak) {
        return response()->json(['error' => 'Lapak tidak ditemukan'], 404);
    }

    return response()->json($lapak);
})->name('lapak.detail');

Route::get('/kabar-pembangunan/detail/{id}', function ($id) {
    $pembangunan = ModelsKabarPembangunan::findOrFail($id);
    if (!$pembangunan) {
        return response()->json(['error' => 'Pembangunan tidak ditemukan'], 404);
    }
    return response()->json($pembangunan);
})->name('kabar-pembangunan.detail');
Route::get('/tentang-desa-rawapanjang', function () {
    $sejarahDesa = SejarahDesa::first();
    return view('warga.profil_desa.tentang-desa', [
        'sejarahDesa' => $sejarahDesa,
    ]);
})->name('sejarah-desa');
Route::get('/visi-misi', function () {
    $visiMisi = VisiMisi::all();
    return view('warga.profil_desa.visi_misi', [
        'visiMisi' => $visiMisi,
    ]);
})->name('visi-misi');

Route::prefix('statistik')->group(function () {
    Route::get('/{kategori}', [StatistikController::class, 'getStatistik'])
        ->where('kategori', 'jenis_kelamin|rentang_usia|kategori_usia|agama|pekerjaan');

    Route::get('/ringkasan/umum', [StatistikController::class, 'getRingkasanStats']);
});
Route::get('/statistik-desa', [StatistikController::class, 'index'])->name('statistik.index');
Route::get('/kabar-pembanguan', function () {
    $pembangunans = ModelsKabarPembangunan::all();
    return view('warga.profil_desa.kabar_pembangunan', [
        'pembangunans' => $pembangunans,
    ]);
})->name('kabar-pembangunan');

// Masuk Menu Layanan Mandiri
Route::middleware(['isAdmin'])->group(function () {
    Route::get('/ganti-pin', [LoginController::class, 'gantiPin'])->name('ganti-pin');
    Route::post('/ganti-pin', [LoginController::class, 'updatePin'])->name('ganti-pin.update');
    Route::get('/layanan-umum', [SuratController::class, 'layananUmum'])->name('layanan-umum');
    Route::get('/layanan-kependudukan', [SuratController::class, 'layananKependudukan'])->name('layanan-kependudukan');
    Route::get('/layanan-catatan-sipil', [SuratController::class, 'layananCatatanSipil'])->name('layanan-catatan-sipil');
    Route::get('/layanan-pernikahan', [SuratController::class, 'layananPernikahan'])->name('layanan-pernikahan');
});

Route::controller(SuratController::class)->group(function () {
    Route::get('/histori-progres-surat', 'histori_progres_surat')->name('histori_progres_surat');
    Route::get('/SKD', 'form_Surat_Keterangan_Domisili');
    Route::get('/SKKTP' , 'form_Surat_Keterangan_KTP_Dalam_Proses');
    Route::get('/SKP', 'form_Surat_Keterangan_Pengantar');

    Route::get('/SKWH', 'form_Surat_Keterangan_Wali_Hakim');
    Route::get('/SKK', 'form_Surat_Keterangan_Kematian');
    Route::get('/SPMAK', 'form_surat_pernyataan_membuat_akta_kelahiran');
    Route::get('/SPJD', 'form_surat_pernyataan_janda_duda');
    Route::post('/submitForm', 'submitForm')->name('submitForm');
    Route::get('/konfirmasi', 'konfirmasi');
    // Route::post('/submitSurat', [SuratController::class, 'submitSurat']);
    Route::get('/berhasil', 'berhasil');
});

// Layanan Mandiri - Preview Surat
Route::get('/skd', [PreviewSuratController::class, 'skd'])->name('preview.skd');
Route::get('/skktp', [PreviewSuratController::class, 'skktp'])->name('preview.skktp');
Route::get('/skp', [PreviewSuratController::class, 'skp'])->name('preview.skp');
Route::get('/skwh', [PreviewSuratController::class, 'skwh'])->name('preview.skwh');
Route::get('/skwh', [PreviewSuratController::class, 'skwh'])->name('preview.skwh');
Route::get('/skk', [PreviewSuratController::class, 'skk'])->name('preview.skk');
Route::get('/spmak', [PreviewSuratController::class, 'spmak'])->name('preview.spmak');
Route::get('/spjd', [PreviewSuratController::class, 'spjd'])->name('preview.spjd');
// ----- Ends of Views Warga ----- //

// ====================================================================== //


// ----- Views Admin Desa ----- //
Route::post('/proses-login', [LoginController::class, 'cekAdminLogin'])->name('cek-credentials');
Route::middleware(['auth'])->group(function () {
    Route::get('/beranda', [AdminController::class, 'index'])->name('admin-beranda');
    Route::post('/tambah-akun', [AdminController::class, 'tambahAkun'])->name('tambah-akun');
    Route::get('/show-akun/{id}', [AdminController::class, 'showAkun'])->name('show-akun');
    Route::post('/update-akun', [AdminController::class, 'updateAkun'])->name('update-akun');
    Route::get('/info-desa', [InformasiDesa::class, 'index'])->name('info-desa.sejarah-desa.index');
    Route::post('/info-desa/store', [InformasiDesa::class, 'storeSejarahDesa'])->name('info-desa.sejarah-desa.store');
    Route::get('/info-desa/detail/{id}', [InformasiDesa::class, 'showSejarahDesa'])->name('info-desa.sejarah-desa.show');
    Route::get('/info-desa/edit/{id}', [InformasiDesa::class, 'editSejarahDesa'])->name('info-desa.sejarah-desa.edit');
    Route::put('/info-desa/update/{id}', [InformasiDesa::class, 'updateSejarahDesa'])->name('info-desa.sejarah-desa.update');
    Route::delete('/info-desa/delete/{id}', [InformasiDesa::class, 'deleteSejarahDesa'])->name('info-desa.sejarah-desa.delete');
    Route::get('/info-desa/visi-misi', [InformasiDesa::class, 'indexVisiMisi'])->name('info-desa.visi-misi.index');
    Route::get('/info-desa/visi-misi/{id}', [InformasiDesa::class, 'showVisiMisi'])->name('info-desa.visi-misi.show');
    Route::post('/info-desa/visi-misi/store', [InformasiDesa::class, 'storeVisiMisi'])->name('info-desa.visi-misi.store');
    Route::get('/info-desa/visi-misi/edit/{id}', [InformasiDesa::class, 'editVisiMisi'])->name('info-desa.visi-misi.edit');
    Route::put('/info-desa/visi-misi/update/{id}', [InformasiDesa::class, 'updateVisiMisi'])->name('info-desa.visi-misi.update');
    Route::delete('/info-desa/visi-misi/delete/{id}', [InformasiDesa::class, 'deleteVisiMisi'])->name('info-desa.visi-misi.delete');
    Route::get('/data-warga', [WargaController::class, 'index'])->name('data-warga');
    Route::get('/show-warga/{id}', [WargaController::class, 'showWarga'])->name('show-warga');
    Route::post('/tambah-warga', [WargaController::class, 'tambahWarga'])->name('tambah-warga');
    Route::post('/update-warga', [WargaController::class, 'updateWarga'])->name('update-warga');
    Route::view('/statistik', 'admin.statistik')->name('statistik');
    Route::view('/pengumuman', 'admin.pengumuman')->name('pengumuman');
    Route::view('/artikel-desa', 'admin.artikel-desa')->name('artikel-desa');
    Route::view('/agenda', 'admin.agenda')->name('agenda');
    Route::get('/pengaturan-akses', [AdminController::class, 'getUsers'])->name('pengaturan-akses')->middleware('permission:akses daftar akun');;

    Route::resource('/lapak-desa', LapakController::class)
        ->names('lapaks');
    Route::resource('/pembangunan-desa', KabarPembangunan::class)->names('pembangunan-desa');
    // Layanan Surat
    // Route::view('/layanan-surat', 'admin.layanan-surat.dalam-proses');
    Route::get('/layanan-surat', [LayananSurat::class, 'index'])->name('layanan-surat-dalam-proses');
    Route::prefix('kelola-surat')->name('kelola-surat.')->group(function () {
        Route::get('/', [LayananSurat::class, 'indexKelolaSurat'])->name('index');

        Route::post('/store', [LayananSurat::class, 'storeKelolaSurat'])->name('store');

        Route::get('/edit/{id}', [LayananSurat::class, 'editKelolaSurat'])->name('edit');

        Route::put('/update/{id}', [LayananSurat::class, 'updateKelolaSurat'])->name('update');

        Route::delete('/delete/{id}', [LayananSurat::class, 'destroyKelolaSurat'])->name('delete');

        Route::get('/show/{id}', [LayananSurat::class, 'showKelolaSurat'])->name('show');
    });
    //
    Route::get('/qr-generate', [LayananSurat::class, 'qrGenerate'])->name('qrGenerate');

    //
    // Proses Surat
    Route::post('/surat-disetujui/{idSurat}', [LayananSurat::class, 'setujuiSurat'])->name('layanan-surat-dalam-proses.setujui');
    Route::get('/surat-ditolak/', [LayananSurat::class, 'getAllSuratDitolak'])->name('layanan-surat-ditolak');
    Route::post('/surat-ditolak/{idSurat}', [LayananSurat::class, 'suratDitolak'])->name('surat.ditolak');
    Route::get('/lihat-surat/{idSurat}', [LayananSurat::class, 'lihatSurat'])->name('layanan-surat-dalam-proses.lihat-surat');
    Route::get('/preview-dokumen/{idSurat}', [LayananSurat::class, 'previewDokumen'])->name('preview.dokumen');
    Route::get('/preview-surat/{jenisSurat}/{id}', [LayananSurat::class, 'previewSurat'])->name('preview.surat');
    Route::get('/search-surat', [LayananSurat::class, 'searchSurat'])->name('search-surat');
    Route::get('/surat-selesai/{idSurat}', [LayananSurat::class, 'suratSelesai'])->name('layanan-surat-dalam-proses-surat-selesai');
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