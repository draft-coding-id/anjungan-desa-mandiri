@extends('layout.warga.form-surat')

@section('title', 'Surat Keterangan Domisili')

@section('header-content')
Surat Keterangan Domisili
@endsection
@section('form-content')
<x-info-box :message="'Silakan lengkapi data berikut untuk pembuatan Surat Keterangan Kematian.'" />

  <form action="{{ url('/submitForm') }}" method="POST">
    @csrf
    <div class="form-group">
      <input type="hidden" name="surat" value="Surat Keterangan KTP Dalam Proses">
    </div>
    <div class="form-group">
      <label>NIK / No. KTP :</label>
      <input type="text" name="nik" value="{{ $warga->nik }}" readonly>
    </div>
    <div class="form-group">
      <label>Nama Lengkap :</label>
      <input type="text" name="nama_lengkap" value="{{ $warga->nama_lengkap }}" readonly>
    </div>
    <div class="form-group">
      <label>Tempat Lahir :</label>
      <input type="text" name="tempat_lahir" value="{{ $warga->tempat_lahir }}" readonly>
    </div>
    <div class="form-group">
      <label>Tanggal Lahir :</label>
      <input type="date" name="tanggal_lahir" value="{{ $warga->tanggal_lahir }}" readonly>
    </div>
    <hr>
    <div class="form-group">
      <label>Alamat / Tempat Tinggal :</label>
      <input type="text" name="alamat" value="{{ $warga->alamat }}" readonly>
    </div>
    <div class="form-group">
      <label>RT :</label>
      <input type="number" name="rt" value="{{ $warga->rt }}" readonly>
    </div>
    <div class="form-group">
      <label>RW :</label>
      <input type="number" name="rw" value="{{ $warga->rw }}" readonly>
    </div>
    <hr>
    <div class="form-group">
      <label>Keperluan :</label>
      <input type="text" name="keperluan" required>
    </div>

    <div class="button-container">
      <button class="button" onclick="window.history.back();">Kembali</button>
      <button type="submit" class="button">Lanjutkan</button>
    </div>
  </form>
</div>
@endsection