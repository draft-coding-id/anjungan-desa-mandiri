@extends('layout.admin.app')
@section('title', 'Detail Pembangunan')
@section('content')

<div class="modal show" tabindex="-1" style="display: flex;">
  <div class="modal-content">
    <div class="modal-header">
      <div class="modal-title">Detail Pembangunan</div>
      <a href="{{ route('pembangunan-desa.index') }}" class="close">&times;</a>
    </div>
    <div class="modal-body">
      <div class="surat-info">
        <div class="info-row" style="justify-content: center;">
          @if($pembangunan->foto)
          <img src="{{ asset('storage/'.$pembangunan->foto) }}" alt="Foto Pembangunan" style="max-width:300px; border-radius:10px; margin-bottom:16px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
          @else
          <span style="color:#aaa; font-style:italic;">Tidak ada foto</span>
          @endif
        </div>

        <div class="info-row">
          <div class="info-label">Nama Pembangunan</div>
          <div class="info-value">{{ $pembangunan->nama }}</div>
        </div>

        <div class="info-row">
          <div class="info-label">Tahun</div>
          <div class="info-value">{{ $pembangunan->tahun }}</div>
        </div>

        <div class="info-row">
          <div class="info-label">Anggaran</div>
          <div class="info-value">Rp {{ number_format($pembangunan->anggaran, 0, ',', '.') }}</div>
        </div>

        <div class="info-row">
          <div class="info-label">Volume</div>
          <div class="info-value">{{ $pembangunan->volume }}</div>
        </div>

        <div class="info-row">
          <div class="info-label">Sumber Dana</div>
          <div class="info-value">
            <span style="background: linear-gradient(to right, #ff8a00 50%, #f7e700); color: white; padding: 4px 12px; border-radius: 15px; font-size: 12px; font-weight: 500;">
              {{ $pembangunan->sumber_dana }}
            </span>
          </div>
        </div>

        <div class="info-row">
          <div class="info-label">Pelaksana</div>
          <div class="info-value">{{ $pembangunan->pelaksana }}</div>
        </div>

        <div class="info-row">
          <div class="info-label">Lokasi</div>
          <div class="info-value">{{ $pembangunan->lokasi }}</div>
        </div>

        @if($pembangunan->link_gmaps)
        <div class="info-row">
          <div class="info-label">Google Maps</div>
          <div class="info-value">
            <a href="{{ $pembangunan->link_gmaps }}" target="_blank" style="color: #1e88e5; text-decoration: none; display: inline-flex; align-items: center; gap: 5px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                <circle cx="12" cy="10" r="3"></circle>
              </svg>
              Lihat Lokasi di Maps
            </a>
          </div>
        </div>
        @endif

        <div class="info-row">
          <div class="info-label">Manfaat</div>
          <div class="info-value" style="text-align: justify; line-height: 1.6;">{{ $pembangunan->manfaat }}</div>
        </div>

        @if($pembangunan->keterangan)
        <div class="info-row">
          <div class="info-label">Keterangan</div>
          <div class="info-value" style="text-align: justify; line-height: 1.6;">{{ $pembangunan->keterangan }}</div>
        </div>
        @endif

        <div class="info-row">
          <div class="info-label">Tanggal Dibuat</div>
          <div class="info-value">{{ $pembangunan->created_at->format('d F Y, H:i') }} WIB</div>
        </div>

        @if($pembangunan->updated_at != $pembangunan->created_at)
        <div class="info-row">
          <div class="info-label">Terakhir Diupdate</div>
          <div class="info-value">{{ $pembangunan->updated_at->format('d F Y, H:i') }} WIB</div>
        </div>
        @endif
      </div>
    </div>

    <div class="button-container">
      <a href="{{ route('pembangunan-desa.index') }}" class="btn btn-secondary">
        Kembali
      </a>
    </div>
  </div>
</div>

@endsection