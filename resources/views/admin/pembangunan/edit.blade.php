@extends('layout.admin.app')
@section('title', 'Edit Data Pembangunan')
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

<div id="editModal" class="modal show">
  <div class="modal-content">
    <div class="modal-header">
      <div class="modal-title">Edit Data Pembangunan</div>
      <a href="{{ route('pembangunan-desa.index') }}" class="close">&times;</a>
    </div>
    
    <form id="editForm" method="POST" action="{{ route('pembangunan-desa.update', $pembangunan->id) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" id="edit-id" value="{{ $pembangunan->id }}">

      <div class="form-group">
        <label for="edit-nama">Nama Pembangunan <span style="color: red;">*</span></label>
        <input type="text" name="nama" id="edit-nama" value="{{ old('nama', $pembangunan->nama) }}" required placeholder="Masukkan nama pembangunan">
        @error('nama')
        <div style="color: red; font-size: 12px;">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="edit-foto">Foto Pembangunan</label>
        @if($pembangunan->foto)
        <div style="margin-bottom:10px;">
          <img src="{{ asset('storage/'.$pembangunan->foto) }}" alt="Foto Pembangunan" style="max-width:150px; height: auto; border-radius:8px; border: 2px solid #ddd;">
          <p style="font-size: 12px; color: #666; margin-top: 5px;">Foto saat ini</p>
        </div>
        @endif
        <input type="file" name="foto" id="edit-foto" accept="image/*">
        @error('foto')
        <div style="color: red; font-size: 12px;">{{ $message }}</div>
        @enderror
        <small class="form-text text-muted">Format: JPG, PNG, JPEG (Max: 2MB). Kosongkan jika tidak ingin mengganti foto.</small>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="edit-tahun">Tahun <span style="color: red;">*</span></label>
          <input type="number" name="tahun" id="edit-tahun" value="{{ old('tahun', $pembangunan->tahun) }}" required min="2000" max="2030" placeholder="Contoh: 2024">
          @error('tahun')
          <div style="color: red; font-size: 12px;">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="edit-anggaran">Anggaran <span style="color: red;">*</span></label>
          <input type="number" name="anggaran" id="edit-anggaran" value="{{ old('anggaran', $pembangunan->anggaran) }}" required min="0" placeholder="Masukkan anggaran dalam rupiah">
          @error('anggaran')
          <div style="color: red; font-size: 12px;">{{ $message }}</div>
          @enderror
          <small class="form-text text-muted">Contoh: 500000000 (untuk Rp 500.000.000)</small>
        </div>
      </div>

      <div class="form-row">
        <div class="form-group">
          <label for="edit-volume">Volume <span style="color: red;">*</span></label>
          <input type="text" name="volume" id="edit-volume" value="{{ old('volume', $pembangunan->volume) }}" required placeholder="Contoh: 500 meter, 10 unit, dll">
          @error('volume')
          <div style="color: red; font-size: 12px;">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="edit-sumber_dana">Sumber Dana <span style="color: red;">*</span></label>
          <select name="sumber_dana" id="edit-sumber_dana" required>
            <option value="">Pilih sumber dana</option>
            <option value="APBD" {{ old('sumber_dana', $pembangunan->sumber_dana) == 'APBD' ? 'selected' : '' }}>APBD</option>
            <option value="APBN" {{ old('sumber_dana', $pembangunan->sumber_dana) == 'APBN' ? 'selected' : '' }}>APBN</option>
            <option value="Dana Desa" {{ old('sumber_dana', $pembangunan->sumber_dana) == 'Dana Desa' ? 'selected' : '' }}>Dana Desa</option>
            <option value="Swadaya Masyarakat" {{ old('sumber_dana', $pembangunan->sumber_dana) == 'Swadaya Masyarakat' ? 'selected' : '' }}>Swadaya Masyarakat</option>
            <option value="CSR" {{ old('sumber_dana', $pembangunan->sumber_dana) == 'CSR' ? 'selected' : '' }}>CSR</option>
            <option value="Hibah" {{ old('sumber_dana', $pembangunan->sumber_dana) == 'Hibah' ? 'selected' : '' }}>Hibah</option>
            <option value="Lainnya" {{ old('sumber_dana', $pembangunan->sumber_dana) == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
          </select>
          @error('sumber_dana')
          <div style="color: red; font-size: 12px;">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="form-group">
        <label for="edit-pelaksana">Pelaksana <span style="color: red;">*</span></label>
        <input type="text" name="pelaksana" id="edit-pelaksana" value="{{ old('pelaksana', $pembangunan->pelaksana) }}" required placeholder="Nama perusahaan/kontraktor pelaksana">
        @error('pelaksana')
        <div style="color: red; font-size: 12px;">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="edit-lokasi">Lokasi <span style="color: red;">*</span></label>
        <textarea name="lokasi" id="edit-lokasi" required placeholder="Masukkan lokasi pembangunan" rows="3">{{ old('lokasi', $pembangunan->lokasi) }}</textarea>
        @error('lokasi')
        <div style="color: red; font-size: 12px;">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="edit-link_gmaps">Link Google Maps</label>
        <input type="url" name="link_gmaps" id="edit-link_gmaps" value="{{ old('link_gmaps', $pembangunan->link_gmaps) }}" placeholder="https://maps.google.com/...">
        @error('link_gmaps')
        <div style="color: red; font-size: 12px;">{{ $message }}</div>
        @enderror
        <small class="form-text text-muted">Opsional - Link lokasi di Google Maps</small>
      </div>

      <div class="form-group">
        <label for="edit-manfaat">Manfaat <span style="color: red;">*</span></label>
        <textarea name="manfaat" id="edit-manfaat" required placeholder="Jelaskan manfaat pembangunan ini untuk masyarakat" rows="4">{{ old('manfaat', $pembangunan->manfaat) }}</textarea>
        @error('manfaat')
        <div style="color: red; font-size: 12px;">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <label for="edit-keterangan">Keterangan</label>
        <textarea name="keterangan" id="edit-keterangan" placeholder="Keterangan tambahan (opsional)" rows="3">{{ old('keterangan', $pembangunan->keterangan) }}</textarea>
        @error('keterangan')
        <div style="color: red; font-size: 12px;">{{ $message }}</div>
        @enderror
      </div>

      <div class="button-container">
        <button type="submit" class="btn btn-primary">
          Simpan Perubahan
        </button>
        <a href="{{ route('pembangunan-desa.index') }}" class="btn btn-secondary">
          Batal
        </a>
      </div>
    </form>
  </div>
</div>

@endsection