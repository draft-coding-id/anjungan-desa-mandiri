@extends('layout.warga.form-surat')

@section('title', 'Surat Keterangan Domisili')

@section('header-content')
Surat Keterangan Domisili
@endsection

@section('form-content')
<x-info-box :message="'Silakan lengkapi data berikut untuk pembuatan Surat Keterangan Kematian.'" />
<form action="{{ route('submitForm') }}" method="POST" enctype="multipart/form-data">
  @csrf

  <input type="hidden" name="jenis_surat" value="SKK">
  <input type="hidden" name="warga_id" value="{{ $warga->id }}">

  <!-- Data Pemohon -->
  <div class="section-title">DATA PEMOHON (Yang Mengajukan Surat)</div>
  <table class="form-table">
    <tr>
      <td>Nama Lengkap</td>
      <td>:</td>
      <td><input type="text" name="nama_lengkap" value="{{$warga->nama_lengkap}}" readonly /></td>
    </tr>
    <tr>
      <td>NIK</td>
      <td>:</td>
      <td><input type="text" name="nik" value="{{$warga->nik}}" readonly /></td>
    </tr>
    <tr>
      <td>Tempat / Tanggal Lahir</td>
      <td>:</td>
      <td>
        <div class="inline-inputs">
          <input type="text" name="tempat_lahir" value="{{$warga->tempat_lahir}}" readonly />
          <input type="date" name="tanggal_lahir" value="{{$warga->tanggal_lahir}}" readonly />
        </div>
      </td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td>:</td>
      <td><input type="text" name="jenis_kelamin" value="{{$warga->jenis_kelamin}}" readonly /></td>
    </tr>
    <tr>
      <td>Agama</td>
      <td>:</td>
      <td><input type="text" name="agama" value="{{$warga->agama}}" readonly /></td>
    </tr>
    <tr>
      <td>Pekerjaan</td>
      <td>:</td>
      <td><input type="text" name="pekerjaan" value="{{$warga->pekerjaan}}" readonly /></td>
    </tr>
    <tr>
      <td>Kewarganegaraan <span class="required">*</span></td>
      <td>:</td>
      <td><input type="text" name="kewarganegaraan" value="{{$warga->kewarganegaraan}}" readonly /></td>
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
      <td>Alamat/Tempat Tinggal</td>
      <td>:</td>
      <td><textarea name="alamat" readonly>{{$warga->alamat}}</textarea></td>
    </tr>
    <tr>
      <td>No. HP <span class="required">*</span></td>
      <td>:</td>
      <td><input type="tel" name="no_hp" required placeholder="Contoh: 081234567890" /></td>
    </tr>
  </table>

  <!-- Data Orang yang Meninggal -->
  <div class="section-title">DATA ORANG YANG MENINGGAL DUNIA</div>
  <table class="form-table">
    <tr>
      <td>Nama Lengkap <span class="required">*</span></td>
      <td>:</td>
      <td><input type="text" name="almarhum_nama" required placeholder="Nama lengkap almarhum/almarhumah" /></td>
    </tr>
    <tr>
      <td>NIK <span class="required">*</span></td>
      <td>:</td>
      <td><input type="text" name="almarhum_nik" required placeholder="16 digit NIK" maxlength="16" /></td>
    </tr>
    <tr>
      <td>Tempat / Tanggal Lahir <span class="required">*</span></td>
      <td>:</td>
      <td>
        <div class="inline-inputs">
          <input type="text" name="almarhum_tempat_lahir" required placeholder="Tempat lahir" />
          <input type="date" name="almarhum_tanggal_lahir" required />
        </div>
      </td>
    </tr>
    <tr>
      <td>Jenis Kelamin <span class="required">*</span></td>
      <td>:</td>
      <td>
        <select name="almarhum_jenis_kelamin" required>
          <option value="">Pilih Jenis Kelamin</option>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Agama <span class="required">*</span></td>
      <td>:</td>
      <td>
        <select name="almarhum_agama" required>
          <option value="">Pilih Agama</option>
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Katolik">Katolik</option>
          <option value="Hindu">Hindu</option>
          <option value="Buddha">Buddha</option>
          <option value="Konghucu">Konghucu</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Pekerjaan</td>
      <td>:</td>
      <td><input type="text" name="almarhum_pekerjaan" placeholder="Pekerjaan almarhum/almarhumah" /></td>
    </tr>
    <tr>
      <td>Kewarganegaraan</td>
      <td>:</td>
      <td>
        <select name="almarhum_kewarganegaraan">
          <option value="WNI" selected>WNI</option>
          <option value="WNA">WNA</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Alamat/Tempat Tinggal <span class="required">*</span></td>
      <td>:</td>
      <td><textarea name="almarhum_alamat" required placeholder="Alamat lengkap almarhum/almarhumah"></textarea>
      </td>
    </tr>
  </table>

  <!-- Data Kematian -->
  <div class="section-title">DATA KEMATIAN</div>
  <table class="form-table">
    <tr>
      <td>Tanggal Meninggal <span class="required">*</span></td>
      <td>:</td>
      <td><input type="date" name="tanggal_meninggal" required /></td>
    </tr>
    <tr>
      <td>Tempat Meninggal <span class="required">*</span></td>
      <td>:</td>
      <td><input type="text" name="tempat_meninggal" required placeholder="Contoh: Rumah Sakit, Rumah, dll" />
      </td>
    </tr>
    <tr>
      <td>Sebab Kematian</td>
      <td>:</td>
      <td><input type="text" name="sebab_kematian" placeholder="Penyebab kematian (opsional)" /></td>
    </tr>
  </table>

  <!-- Hubungan dengan Almarhum -->
  <div class="section-title">HUBUNGAN DENGAN ALMARHUM/ALMARHUMAH</div>
  <table class="form-table">
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
    <tr>
      <td>Keterangan Hubungan</td>
      <td>:</td>
      <td><input type="text" name="keterangan_hubungan" placeholder="Jelaskan hubungan jika memilih 'Lainnya'" />
      </td>
    </tr>
  </table>

  <!-- Dokumen Pendukung -->
  <div class="section-title">DOKUMEN PENDUKUNG</div>
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

  <!-- Keperluan -->
  <div class="section-title">KEPERLUAN SURAT</div>
  <table class="form-table">
    <tr>
      <td>Keperluan <span class="required">*</span></td>
      <td>:</td>
      <td>
        <select name="keperluan" required>
          <option value="">Pilih Keperluan</option>
          <option value="Administrasi Pemakaman">Administrasi Pemakaman</option>
          <option value="Klaim Asuransi">Klaim Asuransi</option>
          <option value="Pengurusan Warisan">Pengurusan Warisan</option>
          <option value="Administrasi Bank">Administrasi Bank</option>
          <option value="Lainnya">Lainnya</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>Keterangan Keperluan</td>
      <td>:</td>
      <td><textarea name="keterangan_keperluan" placeholder="Jelaskan keperluan secara detail"></textarea></td>
    </tr>
  </table>


  <div class="button-container">
    <a href="{{ route('layanan-catatan-sipil') }}" class="button secondary">Kembali</a>
    <button type="submit" class="button">Lanjutkan</button>
  </div>
</form>
@endsection