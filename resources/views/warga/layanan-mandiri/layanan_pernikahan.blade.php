@extends('layout.warga.layanan_digital_dua_kolom')
@section('title', 'Layanan Pernikahan')

@section('header-button')
<h1 class="indigo">Layanan Pernikahan</h1>
@endsection

@section('surat-button')
@forelse($jenisSurat as $surat)
<a href="{{ route('formSurat' , $surat->kode) }}" class="button-indigo">{{$surat->nama}}</a>
@empty
<a href="#" class="button-indigo disabled">Tidak ada layanan</a>
@endforelse
@endsection

@section('nav-button')
<a href="{{route('layanan-kependudukan')}}" class="button">Kembali</a>
<a href="{{route('halaman_utama')}}" class="button">Halaman Utama</a>
<a href="{{route('layanan-catatan-sipil')}}" class="button">Selanjutnya</a>
@endsection