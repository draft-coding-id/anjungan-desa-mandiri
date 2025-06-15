<div class="menu-surat">
  <a href='{{route('layanan-surat-kelola-surat')}}'
    class="{{request()->routeIs('layanan-surat-kelola-surat') ? 'active' : ''}}">Kelola Surat</a>
  <a href='{{route('layanan-surat-dalam-proses')}}'
    class="{{request()->routeIs('layanan-surat-dalam-proses*') ? 'active' : ''}}">Dalam Proses</a>
  <a href='{{route('layanan-surat-ditolak')}}' class="{{request()->routeIs('layanan-surat-ditolak') ? " active" : ''
        }}">Arsip Surat Ditolak</a>
  <a href='{{route('layanan-surat-riwayat')}}'
    class="{{request()->routeIs('layanan-surat-riwayat') ? 'active' : ''}}">Riwayat</a>
</div>