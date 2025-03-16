@extends('layout.warga.layanan_digital')
@section('title' , 'Layanan Pernikahan')
@section('header-button')
<h1 class="indigo">Layanan Pernikahan</h1>
@endsection

@section('surat-button')
<a href="#" class="button-indigo">Surat <br> Keterangan <br> Rujuk Cerai</a>
<a href="#" class="button-indigo">Surat <br> Permohonan <br> Cerai</a>
<a href="#" class="button-indigo">Surat <br> Keterangan <br> Nikah</a>
<a href="#" class="button-indigo">Surat <br> Keterangan <br> Pergi Kawin</a>
<a href="#" class="button-indigo">Surat <br> Keterangan <br> Wali Hakim</a>
@endsection

@section('nav-button')
<a href="{{route('layanan-kependudukan')}}" class="button">Kembali</a>
<a href="{{route('halaman_utama')}}" class="button">Halaman Utama</a>
<a href="{{route('layanan-usaha')}}" class="button">Selanjutnya</a>

@endsection
