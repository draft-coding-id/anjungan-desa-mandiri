@extends('layout.admin.app')
@section('title', 'Detail Lapak')
@section('content')

<div class="modal show" tabindex="-1" style="display: flex;">
  <div class="modal-content">
    <div class="modal-header">
      <div class="modal-title">Detail Lapak</div>
      <a href="{{ route('lapaks.index') }}" class="close">&times;</a>
    </div>
    <div class="modal-body">
      <div class="surat-info">
        <div class="info-row" style="justify-content: center;">
          @if($lapak->gambar)
          <img src="{{ asset('storage/'.$lapak->gambar) }}" alt="Gambar Lapak" style="max-width:200px; border-radius:10px; margin-bottom:16px;">
          @else
          <span style="color:#aaa; font-style:italic;">Tidak ada gambar</span>
          @endif
        </div>
        <div class="info-row">
          <div class="info-label">Nama Lapak</div>
          <div class="info-value">{{ $lapak->nama }}</div>
        </div>
        <div class="info-row">
          <div class="info-label">Deskripsi</div>
          <div class="info-value">{{ $lapak->deskripsi }}</div>
        </div>
        <div class="info-row">
          <div class="info-label">Kategori</div>
          <div class="info-value">{{ $lapak->kategori }}</div>
        </div>
        <div class="info-row">
          <div class="info-label">Harga</div>
          <div class="info-value">Rp {{ number_format($lapak->harga, 0, ',', '.') }}</div>
        </div>
        <div class="info-row">
          <div class="info-label">Link GMaps</div>
          <div class="info-value">
            <a href="{{ $lapak->link_gmaps }}" target="_blank">{{ $lapak->link_gmaps }}</a>
          </div>
        </div>
        <div class="info-row">
          <div class="info-label">Pemilik</div>
          <div class="info-value">{{ $lapak->warga->nama_lengkap ?? '-' }}</div>
        </div>
        <div class="info-row">
          <div class="info-label">No HP</div>
          <div class="info-value">{{ $lapak->no_hp ?? '-' }}</div>
        </div>
      </div>
    </div>
    <div class="button-container">
      <a href="{{ route('lapaks.index') }}" class="btn btn-secondary">Tutup</a>
    </div>
  </div>
</div>

@endsection