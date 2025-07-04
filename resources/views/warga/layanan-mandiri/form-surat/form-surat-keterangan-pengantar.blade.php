@extends('layout.warga.form-surat') <!-- Menggunakan layout form-surat -->

@section('title', 'Surat Keterangan Pengantar')

@section('header-content')
Surat Keterangan Pengantar
@endsection

@section('form-content')
<!-- Menampilkan Info Box -->
<x-info-box :message="'Silakan lengkapi data berikut untuk pembuatan Surat Keterangan Pengantar.'" />

<form action="{{ route('submitForm') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="warga_id" value="{{ $warga->id }}">
    <input type="hidden" name="jenis_surat" value="SKP">

    <!-- Section: Data Pribadi -->
    <div class="section-title">Data Pribadi</div>

    <table class="form-table">
        <tr>
            <td>No. KK <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="text" name="no_kk" value="{{ $warga->no_kk }}" required>
            </td>
        </tr>
        <tr>
            <td>NIK / No. KTP <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="text" name="nik" value="{{ $warga->nik }}" readonly>
            </td>
        </tr>
        <tr>
            <td>Nama Lengkap <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="text" name="nama_lengkap" value="{{ $warga->nama_lengkap }}" readonly>
            </td>
        </tr>
        <tr>
            <td>Tempat Lahir <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="text" name="tempat_lahir" value="{{ $warga->tempat_lahir }}" readonly>
            </td>
        </tr>
        <tr>
            <td>Tanggal Lahir <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="date" name="tanggal_lahir" value="{{ $warga->tanggal_lahir }}" readonly>
            </td>
        </tr>
        <tr>
            <td>Jenis Kelamin <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="text" name="jenis_kelamin" value="{{ $warga->jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan' }}" readonly>
            </td>
        </tr>
        <tr>
            <td>Warga Negara <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="text" name="warga_negara" value="{{ $warga->kewarganegaraan }}" readonly>
            </td>
        </tr>
        <tr>
            <td>Agama <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="text" name="agama" value="{{ $warga->agama }}" readonly>
            </td>
        </tr>
        <tr>
            <td>Pekerjaan <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="text" name="pekerjaan" value="{{ $warga->pekerjaan }}" readonly>
            </td>
        </tr>
        <tr>
            <td>Golongan Darah <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="text" name="gol_darah" value="{{$warga->golongan_darah}}" readonly>
            </td>
        </tr>
    </table>

    <!-- Section: Alamat -->
    <div class="section-title">Alamat</div>
    <table class="form-table">
        <tr>
            <td>RT <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="number" name="rt" value="{{ $warga->rt }}" readonly>
            </td>
        </tr>
        <tr>
            <td>RW <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="number" name="rw" value="{{ $warga->rw }}" readonly>
            </td>
        </tr>
        <tr>
            <td>Alamat / Tempat Tinggal <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="text" name="alamat" value="{{ $warga->alamat }}" readonly>
            </td>
        </tr>
        <tr>
            <td>Kecamatan <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="text" name="kecamatan" value="{{ $warga->kecamatan }}" readonly>
            </td>
        </tr>
        <tr>
            <td>Desa <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="text" name="desa" value="{{ $warga->desa }}" readonly>
            </td>
        </tr>
    </table>

    <!-- Section: Dokumen Pendukung -->
    <div class="section-title">Dokumen Pendukung</div>
    <table class="form-table">
        <tr>
            <td>Upload Kartu Keluarga <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="file" name="file">
                <!-- Menampilkan nama file yang telah di-upload -->
                @if($warga->file_kk)
                <div>
                    <strong>File Kartu Keluarga yang sudah di-upload:</strong>
                    <a href="{{ asset('storage/' . $warga->file_kk) }}" target="_blank">{{ basename($warga->file_kk) }}</a>
                </div>
                @endif
                <div class="file-info">Mohon upload file dengan format PDF (maksimal 2MB)</div>
            </td>
        </tr>
    </table>

    <!-- Section: Informasi Tambahan -->
    <div class="section-title">Informasi Tambahan</div>
    <table class="form-table">
        <tr>
            <td>Keperluan <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="text" name="keperluan" placeholder="Peminjaman Gedung" required>
            </td>
        </tr>
        <tr>
            <td>No HP <span class="required">*</span></td>
            <td>:</td>
            <td>
                <input type="text" name="no_hp" value="" required placeholder="Contoh: 081234567890">
            </td>
        </tr>
    </table>

    <div class="button-container">
        <a href="{{ route('layanan-kependudukan') }}" class="button secondary">Kembali</a>
        <button type="submit" class="button">Lanjutkan</button>
    </div>
</form>
@endsection