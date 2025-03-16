@extends('layout.warga.app')
@section('title' , 'Artikel Terkini')
@section('header' , 'Artikel Terkini')
@section('content')
<h2>
    Artikel Terkini
</h2>
@section('back-button')
<div class="button-container">
    <a href="{{route('halaman_utama')}}" class="button">Kembali</a>
</div>
@endsection
@endsection
