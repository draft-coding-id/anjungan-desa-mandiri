@extends('layout.warga.layanan_digital')
@section('title' , 'Layanan Kependudukan')
@section('header-button')
<h1 class="skyblue">Layanan Kependudukan</h1>
@endsection

@section('surat-button')
<a href="" class="button-skyblue">Surat <br> Keterangan <br> Kematian</a>
<a href="/surat-keterangan-domisili" class="button-skyblue">Surat <br> Keterangan <br> Domisili</a>
<a href="" class="button-skyblue">Surat <br> Permohonan <br> Perubahan KK </a>
@endsection

@section('nav-button')
<a href="{{route('layanan-umum')}}" class="button">Kembali</a>
<a href="{{route('halaman_utama')}}" class="button">Halaman Utama</a>
<a href="{{route('layanan-pernikahan')}}" class="button">Selanjutnya</a>

@endsection