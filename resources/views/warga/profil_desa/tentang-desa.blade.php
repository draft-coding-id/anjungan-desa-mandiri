@extends('layout.warga.app')
@section('title' , 'Tentang Desa')
@section('header' , 'Tentang Desa')
@section('content')
<h2>
    Tentang Desa
</h2>
@section('back-button')
<div class="button-container">
    <a href="{{route('halaman_utama')}}" class="button">Kembali</a>
</div>
@endsection
@endsection
