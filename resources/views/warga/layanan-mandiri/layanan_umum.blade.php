@extends('layout.warga.layanan_digital_dua_kolom')
@section('title', 'Layanan Umum')

@section('header-button')
<h1 class="green">Layanan Umum</h1>
@endsection

@section('surat-button')
<a href="#" class="button-green">Surat Izin <br> Keramaian</a>
<a href="#" class="button-green">Surat <br> Keterangan <br> Tidak Mampu</a>
<a href="/surat-keterangan-pengantar" class="button-green">Surat <br> Keterangan <br> Pengantar</a>
@endsection

@section('nav-button')
<a href="{{route('logout-warga')}}" class="button">Halaman Utama</a>
<a href="{{route('layanan-kependudukan')}}" class="button">Selanjutnya</a>
@endsection