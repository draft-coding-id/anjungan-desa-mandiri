@extends('layout.warga.layanan_digital')
@section('title' , 'Layanan Umum')
@section('header-button')
<h1 class="green">Layanan Umum</h1>
@endsection

@section('surat-button')
<a href="#" class="button-green">Surat Izin <br> keramaian</a>
<a href="#" class="button-green">Surat <br> Keterangan <br> Tidak Mampu</a>
<a href="/surat-keterangan-pengantar" class="button-green">Surat <br> Keterangan <br> Pengantar</a>
@endsection

@section('nav-button')
<a href="{{route('dashboard')}}" class="button">Kembali</a>
<a href="{{route('halaman_utama')}}" class="button">Halaman Utama</a>
<a href="{{route('layanan-kependudukan')}}" class="button">Selanjutnya</a>

@endsection