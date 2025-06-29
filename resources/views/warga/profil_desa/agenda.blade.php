@extends('layout.warga.app')
@section('title' , 'Agenda Desa Rawapanjang')
@section('header' , 'Agenda Desa Rawapanjang')
@section('content')
<iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&ctz=Asia%2FJakarta&title=Agenda%20Desa&showPrint=0&src=cmFpaGFuZGFybWF3YW5AdXBudmouYWMuaWQ&color=%23039be5" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
@section('back-button')
<div class="button-container">
    <a href="{{route('halaman_utama')}}" class="button">Kembali</a>
</div>
@endsection
@endsection