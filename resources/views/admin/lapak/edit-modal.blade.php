<!-- Modal Edit -->
@extends('layout.admin.app')
@section('title', 'Detail Lapak')
@section('content')
@if ($errors->any())
<div class="alert alert-danger" style="margin-bottom: 20px; border-radius: 10px; background: linear-gradient(90deg,#ff8a00,#f7e700); color: #333; font-weight: 500; box-shadow: 0 4px 15px rgba(255,138,0,0.15);">
  <ul style="margin: 0; padding-left: 20px;">
    @foreach ($errors->all() as $error)
    <li style="margin-bottom: 5px;">{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<div id="editModal" class="modal" tabindex="-1" style="display: flex; align-items:center ; justify-content:center">
  <div class="modal-content">
    <div class="modal-header">
      <div class="modal-title">Edit Lapak</div>
      <a href="{{ route('lapaks.index') }}" class="close">&times;</a>
    </div>
    <form id="editForm" method="POST" action="{{ route('lapaks.update', $lapak->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" id="edit-id" value="{{ $lapak->id }}">

      <div class="form-group">
        <label for="edit-gambar">Gambar Lapak</label>
        @if($lapak->gambar)
        <div style="margin-bottom:10px;">
          <img src="{{ asset('storage/'.$lapak->gambar) }}" alt="Gambar Lapak" style="max-width:120px; border-radius:6px;">
        </div>
        @endif
        <input type="file" name="gambar" id="edit-gambar" accept="image/*">
        @error('gambar')
        <div style="color: red;">{{ $message }}</div>
        @enderror
        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
      </div>

      <div class="form-group">
        <label for="edit-nama">Nama Lapak</label>
        <input type="text" name="nama" id="edit-nama" value="{{ $lapak->nama }}" required>
      </div>

      <div class="form-group">
        <label for="edit-deskripsi">Deskripsi</label>
        <textarea name="deskripsi" id="edit-deskripsi" required>{{ $lapak->deskripsi }}</textarea>
      </div>

      <div class="form-group">
        <label for="edit-kategori">Kategori</label>
        <select name="kategori" id="edit-kategori" required>
          <option value="makanan" {{ $lapak->kategori == 'makanan' ? 'selected' : '' }}>Makanan</option>
          <option value="bangunan" {{ $lapak->kategori == 'bangunan' ? 'selected' : '' }}>Bangunan</option>
          <option value="jasa servis" {{ $lapak->kategori == 'jasa servis' ? 'selected' : '' }}>Jasa Servis</option>
          <option value="minuman" {{ $lapak->kategori == 'minuman' ? 'selected' : '' }}>Minuman</option>
        </select>
      </div>

      <div class="form-group">
        <label for="edit-harga">Harga</label>
        <input type="number" name="harga" id="edit-harga" value="{{ $lapak->harga }}" required>
      </div>
      <div class="form-group">
        <label for="edit-no_hp">No HP</label>
        <input type="number" name="no_hp" id="edit-no_hp" value="{{ $lapak->no_hp }}" required>
      </div>

      <div class="form-group">
        <label for="edit-link_gmaps">Link GMaps</label>
        <input type="url" name="link_gmaps" id="edit-link_gmaps" value="{{ $lapak->link_gmaps }}">
      </div>

      <div class="form-group">
        <label for="edit-warga_id">Pilih Warga</label>
        <select name="warga_id" id="edit-warga_id" required>
          <option selected value="{{ $lapak->warga_id }}">{{ $lapak->warga->nama_lengkap }}</option>
          @foreach ($wargas as $warga)
          @if($warga->id != $lapak->warga_id)
          <option value="{{ $warga->id }}">{{ $warga->nama_lengkap }}</option>
          @endif
          @endforeach
        </select>
      </div>

      <div class="button-container">
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('lapaks.index') }}" class="btn btn-secondary">Tutup</a>
      </div>
    </form>
  </div>
</div>
@endsection