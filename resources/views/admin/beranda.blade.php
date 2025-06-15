@extends('layout.admin.app')
@section('title', 'Beranda')
@section('content')
<h4>Beranda</h4>

<section aria-labelledby="header-beranda" class="header-beranda">
    <h2>Selamat Datang , {{auth()->user()->name}}</h2>
</section>

<section aria-labelledby="card-beranda" class="card-beranda">
    <a href="{{ route('layanan-surat-dalam-proses') }}" class="card">
        <h2>{{ $data['suratDiProses'] }}</h2>
        <p>Surat yang perlu diproses</p>
    </a>
    <a href="{{ route('layanan-surat-riwayat') }}" class="card">
        <h2>{{$data['suratMasukBulanIni']}}</h2>
        <p>Surat yang masuk bulan ini</p>
    </a>
    <a href="{{ route('data-warga') }}" class="card">
        <h2>{{$data['warga']}}</h2>
        <p>Populasi saat ini di </p>
    </a>
</section>

@endsection