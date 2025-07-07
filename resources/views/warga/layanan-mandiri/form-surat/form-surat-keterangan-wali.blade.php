@extends('layout.warga.form-surat')

@section('title', 'Surat Keterangan Wali')

@section('header-content')
Surat Keterangan Wali
@endsection

@section('form-content')
<x-info-box :message="'Silakan lengkapi data berikut untuk pembuatan Surat Keterangan Wali.'" />

<form action="{{ route('submitForm') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="jenis_surat" value="SKW">
  <input type="hidden" name="warga_id" value="{{ $warga->id }}">

  <!-- Section: Data Pribadi -->
  <div class="section-title">Data Pribadi</div>
  <table class="form-table">
    <tr>
      <td>Nama Lengkap <span class="required">*</span></td>
      <td>:</td>
      <td>
        <input type="text" name="nama_lengkap" value="{{ $warga->nama_lengkap }}" readonly />
      </td>
    </tr>
    <tr>
      <td>NIK <span class="required">*</span></td>
      <td>:</td>
      <td>
        <input type="text" name="nik" value="{{ $warga->nik }}" readonly />
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
        <input type="text" name="jenis_kelamin" value="{{ $warga->jenis_kelamin }}" readonly />
      </td>
    </tr>
    <tr>
      <td>Kecamatan <span class="required">*</span></td>
      <td>:</td>
      <td>
        <input type="text" name="kecamatan" value="{{ $warga->kecamatan }}" readonly />
      </td>
    </tr>
    <tr>
      <td>Desa <span class="required">*</span></td>
      <td>:</td>
      <td>
        <input type="text" name="desa" value="{{ $warga->desa }}" readonly />
      </td>
    </tr>
    <tr>
      <td>RT <span class="required">*</span></td>
      <td>:</td>
      <td>
        <input type="text" name="rt" value="{{ $warga->rt }}" readonly />
      </td>
    </tr>
    <tr>
      <td>RW <span class="required">*</span></td>
      <td>:</td>
      <td>
        <input type="text" name="rw" value="{{ $warga->rw }}" readonly />
      </td>
    </tr>
    <tr>
      <td>Alamat <span class="required">*</span></td>
      <td>:</td>
      <td>
        <textarea name="alamat" readonly>{{ $warga->alamat }}</textarea>
      </td>
    </tr>
  </table>
  <div class="section-title">DATA WALI</div>
  <table class="form-table">
    <tr>
      <td>Nama Lengkap <span class="required">*</span></td>
      <td>:</td>
      <td><input type="text" name="wali_nama" required placeholder="Nama Lengkap Wali" /></td>
    </tr>
    <tr>
      <td>NIK <span class="required">*</span></td>
      <td>:</td>
      <td><input type="text" name="wali_nik" required placeholder="16 digit NIK" maxlength="16" /></td>
    </tr>
    <tr>
      <td>Tempat / Tanggal Lahir <span class="required">*</span></td>
      <td>:</td>
      <td>
        <div class="inline-inputs">
          <input type="text" name="wali_tempat_lahir" required placeholder="Tempat lahir" />
          <input type="date" name="wali_tanggal_lahir" required />
        </div>
      </td>
    </tr>
    <tr>
      <td>Jenis Kelamin <span class="required">*</span></td>
      <td>:</td>
      <td>
        <select name="wali_jenis_kelamin" required>
          <option value="">Pilih Jenis Kelamin</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Pekerjaan</td>
      <td>:</td>
      <td><input type="text" name="wali_pekerjaan" placeholder="Pekerjaan Wali" /></td>
    </tr>
    <tr>
      <td>Alamat/Tempat Tinggal <span class="required">*</span></td>
      <td>:</td>
      <td><textarea name="wali_alamat" required placeholder="Alamat lengkap wali"></textarea>
      </td>
    </tr>
    <tr>
      <td>Hubungan Keluarga <span class="required">*</span></td>
      <td>:</td>
      <td>
        <select name="hubungan_keluarga" required>
          <option value="">Pilih Hubungan</option>
          <option value="Ayah">Ayah</option>
          <option value="Ibu">Ibu</option>
          <option value="Suami">Suami</option>
          <option value="Istri">Istri</option>
          <option value="Anak">Anak</option>
          <option value="Saudara">Saudara</option>
          <option value="Keponakan">Keponakan</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </td>
    </tr>
  </table>
  <!-- Section: Dokumen Pendukung -->
  <div class="section-title">Dokumen Pendukung</div>
  <table class="form-table">
    <tr>
      <td>Upload File <span class="required">*</span></td>
      <td>:</td>
      <td>
        <input type="file" name="file" />
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
      <td>No HP <span class="required">*</span></td>
      <td>:</td>
      <td>
        <input type="text" name="no_hp" required />
      </td>
    </tr>
    <tr>
      <td>Keperluan <span class="required">*</span></td>
      <td>:</td>
      <td>
        <textarea name="keperluan" required placeholder="Tuliskan keperluan Anda..."></textarea>
      </td>
    </tr>
  </table>

  <div class="button-container">
    <a href="{{ route('layanan-pernikahan') }}" class="button secondary">Kembali</a>
    <button type="submit" class="button">Lanjutkan</button>
  </div>
</form>
@endsection