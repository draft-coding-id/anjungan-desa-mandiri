@extends('layout.warga.layanan_digital_dua_kolom')
@section('title', 'Layanan Umum')

@section('header-button')
<h1 class="green">Layanan Umum</h1>
@endsection

@section('surat-button')
@forelse ($jenisSurat as $surat)
<a href="{{$surat->kode_surat}}" class="button-green">{{ $surat->nama_surat }}</a>
@empty
<span class="green">Tidak ada layanan umum yang tersedia saat ini.</span>
@endforelse
@endsection

  @section('nav-button')
  <a href="{{route('halaman_utama')}}" class="button">Halaman Utama</a>
<a href="{{route('layanan-kependudukan')}}" class="button">Selanjutnya</a>
@endsection