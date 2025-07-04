@extends('layout.warga.layanan_digital_dua_kolom')
@section('title', 'Layanan Catatan Sipil')

@section('header-button')
<h1 class="coffee">Layanan Catatan Sipil</h1>
@endsection

@section('surat-button')
<a href="#" class="button-coffee">Surat Keterangan Kelahiran</a>
<a href="/surat-keterangan-kematian" class="button-coffee">Surat Keterangan Kematian</a>
<a href="#" class="button-coffee">Surat Pernyataan Membuat Akta Kelahiran</a>
@endsection

@section('nav-button')
<a href="{{route('layanan-pernikahan')}}" class="button">Kembali</a>
<a href="{{route('halaman_utama')}}" class="button">Halaman Utama</a>
@endsection