@extends('layout.warga.layanan_digital_dua_kolom')
@section('title', 'Layanan Catatan Sipil')

@section('header-button')
<h1 class="coffee">Layanan Catatan Sipil</h1>
@endsection

@section('surat-button')
@forelse ($jenisSurat as $surat)
<a href="{{$surat->kode_surat}}" class="button-coffee">{{ $surat->nama_surat }}</a>
@empty
<span class="coffee">Tidak ada layanan catatan sipil yang tersedia saat ini.</span>
@endforelse
@endsection

@section('nav-button')
<a href="{{route('layanan-pernikahan')}}" class="button">Kembali</a>
<a href="{{route('halaman_utama')}}" class="button">Halaman Utama</a>
@endsection