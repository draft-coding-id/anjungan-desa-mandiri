@extends('layout.admin.app')
@section('title', 'Detail Lapak')
@section('content')

<div class="modal show" tabindex="-1" style="display: flex;">
  <div class="modal-content">
    <div class="modal-header">
      <div class="modal-title">Detail Sejarah Desa</div>
      <a href="{{ route('info-desa.sejarah-desa.index') }}" class="close">&times;</a>
    </div>
    <div class="modal-body">
      <div class="surat-info">
        <div class="info-row">
          <div class="info-label">Judul Informasi:</div>
          <div class="info-value">{{ $sejarahDesa->judul }}</div>
        </div>
        <div class="info-row">
          <div class="info-label">Konten Informasi:</div>
          <div class="info-value">{{ $sejarahDesa->content }}</div>
        </div>
        <div class="info-row">
          <div class="info-label">Data Pemimpin Desa:</div>
          <div class="info-value">
              @foreach($sejarahDesa->pemimpin_desa as $item)
              <p>
                <strong>{{ $item['nama'] }}</strong> | 
                <small class="text-muted">
                  Periode : {{ \Carbon\Carbon::parse($item['mulai_jabat'])->translatedFormat('d F Y') }} - {{ \Carbon\Carbon::parse($item['akhir_jabat'])->translatedFormat('d F Y') }}
                </small>
              </p>
              @endforeach
          </div>

        </div>
      </div>
    </div>
    <div class="modal-footer">
      <div class="button-container">
        <a href="{{ route('info-desa.sejarah-desa.index') }}" class="btn btn-secondary">Tutup</a>
      </div>
    </div>
  </div>
</div>

@endsection