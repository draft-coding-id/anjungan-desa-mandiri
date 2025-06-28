@extends('layout.admin.app')
@section('title', 'Detail Lapak')
@section('content')

<div class="modal show" tabindex="-1" style="display: flex;">
  <div class="modal-content">
    <div class="modal-header">
      <div class="modal-title">Detail Sejarah Desa</div>
      <a href="{{ route('info-desa.visi-misi.index') }}" class="close">&times;</a>
    </div>
    <div class="modal-body">
      <div class="surat-info">
        <div class="info-row">
          <div class="info-label">Judul:</div>
          <div class="info-value">{{ $visiMisi->judul }}</div>
        </div>
        <div class="info-row">
          <div class="info-label">Konten:</div>
          <div class="info-value">
            @foreach($visiMisi->konten as $item)
            <p>
              <span>{{ $item}}</span>
            </p>
            @endforeach
          </div>

        </div>
      </div>
    </div>
    <div class="modal-footer">
      <div class="button-container">
        <a href="{{ route('info-desa.visi-misi.index') }}" class="btn btn-secondary">Tutup</a>
      </div>
    </div>
  </div>
</div>

@endsection