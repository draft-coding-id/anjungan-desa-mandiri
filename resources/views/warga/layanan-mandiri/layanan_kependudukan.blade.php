@extends('layout.warga.layanan_digital_dua_kolom')
@section('title', 'Layanan Kependudukan')

@section('header-button')
<h1 class="skyblue">Layanan Kependudukan</h1>
@endsection
@section('surat-button')
@forelse($jenisSurat as $surat)
<a href="{{ route('formSurat' , $surat->kode) }}" class="button-skyblue" > {{ $surat->nama }} </a>
@empty
<a href="#" class="button-skyblue disabled">Tidak ada layanan</a>
@endforelse
@endsection

@section('nav-button')
<a href="{{route('layanan-umum')}}" class="button">Kembali</a>
<a href="{{route('halaman_utama')}}" class="button">Halaman Utama</a>
<a href="{{route('layanan-pernikahan')}}" class="button">Selanjutnya</a>
@endsection