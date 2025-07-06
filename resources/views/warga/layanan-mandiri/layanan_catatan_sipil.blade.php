@extends('layout.warga.layanan_digital_dua_kolom')
@section('title', 'Layanan Catatan Sipil')

@section('header-button')
<h1 class="coffee">Layanan Catatan Sipil</h1>
@endsection

@section('surat-button')
@forelse($jenisSurat as $surat)
<a href="{{ route('formSurat' , $surat->kode) }}" class="button-coffee"> {{ $surat->nama }} </a>

@empty
<a href="#" class="button-coffee disabled">Tidak ada layanan</a>
@endforelse
@endsection

@section('nav-button')
<a href="{{route('layanan-pernikahan')}}" class="button">Kembali</a>
<a href="{{route('halaman_utama')}}" class="button">Halaman Utama</a>
@endsection