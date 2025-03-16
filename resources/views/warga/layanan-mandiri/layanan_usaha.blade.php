@extends('layout.warga.layanan_digital')
@section('title' , 'Layanan Usaha')
@section('header-button')
<h1 class="coffee">Layanan Kependudukan</h1>
@endsection

@section('surat-button')
<a href="" class="button-coffee">Surat <br> Keterangan <br> Domisili Usaha</a>
<a href="" class="button-coffee">Surat <br> Keterangan <br> Usaha</a>
@endsection

@section('nav-button')
<a href="{{route('layanan-pernikahan')}}" class="button">Kembali</a>
<a href="{{route('halaman_utama')}}" class="button">Halaman Utama</a>
{{-- <a href="#" class="button">Selanjutnya</a> --}}

@endsection