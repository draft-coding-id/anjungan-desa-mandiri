@extends('layout.warga.layanan_digital')
@section('title' , 'Layanan Pernikahan')
@section('header-button')
<h1 class="indigo">Layanan Pernikahan</h1>
@endsection

@section('surat-button')
<a href="#" class="button-indigo">Surat <br> Keterangan <br> Menikah</a>
<a href="#" class="button-indigo">Surat <br> Keterangan Wali</a>
<a href="/surat-keterangan-wali-hakim" class="button-indigo">Surat <br> Keterangan <br> Wali Hakim</a>
<a href="#" class="button-indigo">Surat <br> Pengantar <br> Nikah</a>
<a href="#" class="button-indigo">Surat <br> Permohonan <br> Cerai</a>
<a href="#" class="button-indigo">Surat <br> Pernyataan <br> Janda/Duda</a>
@endsection

@section('nav-button')
<a href="{{route('layanan-kependudukan')}}" class="button">Kembali</a>
<a href="{{route('halaman_utama')}}" class="button">Halaman Utama</a>
<a href="{{route('layanan-catatan-sipil')}}" class="button">Selanjutnya</a>

@endsection
