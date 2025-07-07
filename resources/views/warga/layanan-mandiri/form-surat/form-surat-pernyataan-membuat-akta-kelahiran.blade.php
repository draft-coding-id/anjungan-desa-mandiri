@extends('layout.warga.form-surat')

@section('title', 'Surat Pernyataan Membuat Akta Kelahiran')

@section('header-content')
Surat Pernyataan Membuat Akta Kelahiran
@endsection

@section('form-content')
<x-info-box :message="'Silakan lengkapi data berikut untuk pembuatan Surat Pernyataan Membuat Akta Kelahiran.'" />


<form action="{{ route('submitForm') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="warga_id" value="{{ $warga->id }}">
  <input type="hidden" name="jenis_surat" value="SPMAK">

  <!-- Section: Data Pribadi -->
  <div class="section-title">Data Pribadi</div>

  <!-- Form Table Komponen -->
  <table class="form-table">
    <tr>
        <td>Nama Lengkap <span class="required">*</span></td>
        <td>:</td>
        <td>
            <input type="text" name="nama_lengkap" value="{{ $warga->nama_lengkap }}" readonly>
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
      <td>Pekerjaan <span class="required">*</span></td>
      <td>:</td>
      <td>
        <input type="text" name="pekerjaan" value="{{ $warga->pekerjaan }}" readonly>
      </td>
    </tr>

    <tr>
      <td>
        RT
      </td>
      <td>
        :
      </td>
      <td><input type="text" name="rt" value="{{$warga->rt}}" readonly /></td>
    </tr>
    <tr>
      <td>
        RW
      </td>
      <td>
        :
      </td>
      <td><input type="text" name="rw" value="{{$warga->rw}}" readonly /></td>
    </tr>
    <tr>
      <td>Agama</td>
      <td>:</td>
      <td><textarea name="agama" readonly>{{$warga->agama}}</textarea></td>
    </tr>
    <tr>
      <td>Alamat/Tempat Tinggal</td>
      <td>:</td>
      <td><textarea name="alamat" readonly>{{$warga->alamat}}</textarea></td>
    </tr>
  </table>

  <!-- Section: Dokumen Pendukung -->
  <div class="section-title">Dokumen Pendukung</div>

  <table class="form-table">
    <tr>
      <td>Upload Kartu Keluarga <span class="required">*</span></td>
      <td>:</td>
      <td>
        <input type="file" name="file" accept=".pdf">

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
      <td>No HP <span class="required">*</span></td>
      <td>:</td>
      <td>
        <input type="tel" name="no_hp" required placeholder="Contoh: 081234567890">
      </td>
    </tr>
    <tr>
      <td>Nama anak <span class="required">*</span></td>
      <td>:</td>
      <td>
        <input type="text" name="nama_anak" required placeholder="Contoh: Fardan Nurhidayat">
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
    <a href="{{ route('layanan-catatan-sipil') }}" class="button secondary">Kembali</a>
    <button type="submit" class="button">Lanjutkan</button>
  </div>
</form>
@endsection