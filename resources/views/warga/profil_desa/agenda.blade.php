@extends('layout.warga.app')
@section('title' , 'Agenda Desa Rawapanjang')
@section('header' , 'Agenda Desa Rawapanjang')
@section('content')
<iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=Asia%2FJakarta&showPrint=0&title=Agenda%20Desa%20Rawapanjang%20&hl=id&src=bWF0YXJhbWt1bm8xOTQ1QGdtYWlsLmNvbQ&src=aWQuaW5kb25lc2lhbiNob2xpZGF5QGdyb3VwLnYuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&color=%23039be5&color=%23ed201d" style="border:solid 1px #777" width="900" height="600" frameborder="0" scrolling="no"></iframe>
@section('back-button')
<div class="button-container">
    <a href="{{route('halaman_utama')}}" class="button">Kembali</a>
</div>
@endsection
@endsection