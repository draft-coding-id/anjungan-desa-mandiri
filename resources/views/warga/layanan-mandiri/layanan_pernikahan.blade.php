@extends('layout.warga.layanan_digital_dua_kolom')
@section('title', 'Layanan Pernikahan')

@section('header-button')
<h1 class="indigo">Layanan Pernikahan</h1>
@endsection

@section('surat-button')
@forelse ($jenisSurat as $surat)
<a href="{{$surat->kode_surat}}" class="button-indigo">{{ $surat->nama_surat }}</a>
@empty
<span class="indigo">Tidak ada layanan pernikahan saat ini.</span>
@endforelse
@endsection

@section('nav-button')
<a href="{{route('layanan-kependudukan')}}" class="button">Kembali</a>
<a href="{{route('halaman_utama')}}" class="button">Halaman Utama</a>
<a href="{{route('layanan-catatan-sipil')}}" class="button">Selanjutnya</a>
@endsection