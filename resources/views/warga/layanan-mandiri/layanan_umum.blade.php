@extends('layout.warga.layanan_digital_dua_kolom')
@section('title', 'Layanan Umum')

@section('header-button')
<h1 class="green">Layanan Umum</h1>
@endsection

@section('surat-button')
@forelse($jenisSurat as $surat)
<a href="{{ route('formSurat' ,$surat->kode) }}" class="button-green">{{$surat->nama}}</a>
@empty
<a href="#" class="button-green disabled">Belum ada layanan</a>
@endforelse
@endsection

@section('nav-button')
<a href="{{route('halaman_utama')}}" class="button">Halaman Utama</a>
<a href="{{route('layanan-kependudukan')}}" class="button">Selanjutnya</a>
@endsection