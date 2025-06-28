@extends('layout.warga.tentang-desa-layout')
@section('title' , 'Tentang Desa')
@section('header' , 'Tentang Desa')
@section('content')
<div class="container" style="height: 100%">
    <h1>Visi & Misi Desa Rawapanjang</h1>
    @forelse($visiMisi as $data)
        @if($data->judul == 'Visi' || $data->judul == 'visi')
        <h3>{{$data->judul}}</h3>
        <p>
            {{ $data->konten[0] }}
        </p>
        @else
        <h3>{{$data->judul}}</h3>
        <ul>
            @foreach($data->konten as $item)
            <li>{{$item}}</li>
            @endforeach
        </ul>
        @endif
    @empty
    <h2>Belum ada informasi apapun</h2>
    @endforelse
</div>
@section('footer')
@include('layout.warga.tentang-desa-navbar')
@endsection
@endsection