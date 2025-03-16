@extends('layout.warga.app')
@section('title' , 'Agenda Rawapanjang')
@section('header' , 'Agenda Rawapanjang')
@section('content')

@include('layout.warga.bar-agenda')
@section('back-button')
<div class="button-container">
    <a href="{{route('halaman_utama')}}" class="button">Kembali</a>
</div>
@endsection
@endsection
