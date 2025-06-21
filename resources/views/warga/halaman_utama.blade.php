@extends('layout.warga.app')
@section('title' , 'Halaman Utama')
@section('header' , 'Selamat Datang di Anjungan Desa Mandiri Desa Rawapanjang Kabupaten Bogor')
@section('content')
<iframe
    width="800"
    height="500"
    src="https://www.youtube.com/embed/5Ds6RMBPjKg?autoplay=1&mute=1&loop=1&playlist=5Ds6RMBPjKg"
    title="YouTube video player"
    frameborder="0"
    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
    referrerpolicy="strict-origin-when-cross-origin"
    allowfullscreen>
</iframe>
@section('footer')
@include('layout.warga.navbar');
@endsection
@endsection